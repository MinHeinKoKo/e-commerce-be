<?php


namespace App\Services\Order;


use App\Helpers\ResponseHelper;
use App\Models\Order;
use App\Models\Product;
use App\Models\Receipt;
use App\Models\User;
use App\Notifications\OrderNotification;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class OrderService
{
    private static $total = 0;
    private static $orderIdLists = [];

    public static function calculateTotalPrice(array $orderItems , $userId)
    {
        try {
            DB::beginTransaction();

            $user = User::find($userId);

            foreach ($orderItems as $item) {
                $productId = $item['product_id'];
                $qty = $item['qty'];

                $product = Product::find($productId);

                $orderId = self::storeInOrder($product, $qty , $userId);

                if (!in_array($orderId, self::$orderIdLists)) {
                    self::$orderIdLists[] = $orderId;
                }

                if (!$product || !self::checkProductQuantity($product, $qty)) {
                    return ResponseHelper::fail("Invalid product or quantity in the order.", Response::HTTP_BAD_REQUEST);
                }

                self::calculateTotal($product, $qty);
            }

            $receipt = self::storeInReceipt($userId);

            self::storeInPivot($receipt);

            $admin = self::admins();

            Notification::send($admin, new OrderNotification($receipt, $user));
            self::createFilamentNotification($user);

            DB::commit();

            return self::$total;
        } catch (\Exception $e) {
            DB::rollBack();
            // Log or handle the exception as needed
            return ResponseHelper::fail("An error occurred during order processing.", Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public static function createFilamentNotification(User $user)
    {
        return \Filament\Notifications\Notification::make()
            ->title("Order")
            ->body($user->name." is ordering")
            ->icon('heroicon-o-users')
            ->iconColor("success")
            ->sendToDatabase($user)
            ->send();
    }

    public static function storeInOrder(Product $product , int $qty , $userId)
    {
        $order = new Order();
        $order->user_id = $userId;
        $order->product_id = $product->id;
        $order->quantity = $qty;
        $order->price = $product->price * $qty;
        $order->save();
        $product->update(["quantity" => $product->quantity - $qty]);
        return $order->id;
    }

    public static function storeInReceipt(int $userId)
    {
        return Receipt::create([
            "user_id" => $userId,
            "total" => self::$total
        ]);
    }

    public static function checkProductQuantity(Product $product, int $qty)
    {
        return $product->quantity >= $qty;
    }

    public static function calculateTotal($product, $qty)
    {
        $cost = $product->price * $qty;
        self::$total += $cost;
    }

    public static function storeInPivot(Receipt $receipt)
    {
        return $receipt->orders()->attach(self::$orderIdLists) ? "Success" : "Failed";
    }

    public static function admins()
    {
        return User::where("role", "admin")->get();
    }

}
