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

    public static function calculateTotalPrice(array $orderItems)
    {
        try {
            DB::beginTransaction();

            foreach ($orderItems as $item) {
                $productId = $item['product_id'];
                $qty = $item['qty'];

                $product = Product::find($productId);

                $orderId = self::storeInOrder($product, $qty);

                if (!in_array($orderId, self::$orderIdLists)) {
                    self::$orderIdLists[] = $orderId;
                }

                if (!$product || !self::checkProductQuantity($product, $qty)) {
                    return ResponseHelper::fail("Invalid product or quantity in the order.", Response::HTTP_BAD_REQUEST);
                }

                self::calculateTotal($product, $qty);
            }

            $receipt = self::storeInReceipt();

            self::storeInPivot($receipt);

            $admin = self::admins();

            Notification::send($admin, new OrderNotification($receipt, Auth::user()));

            DB::commit();

            return self::$total;
        } catch (\Exception $e) {
            DB::rollBack();
            // Log or handle the exception as needed
            return ResponseHelper::fail("An error occurred during order processing.", Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public static function storeInOrder(Product $product , int $qty)
    {
        $order = new Order();
        $order->user_id = Auth::id();
        $order->product_id = $product->id;
        $order->quantity = $qty;
        $order->price = $product->price * $qty;
        $order->save();
        return $order->id;
    }

    public static function storeInReceipt()
    {
        return Receipt::create([
            "user_id" => Auth::id(),
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
