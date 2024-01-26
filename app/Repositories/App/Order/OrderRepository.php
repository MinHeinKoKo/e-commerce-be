<?php


namespace App\Repositories\App\Order;


use App\Helpers\ResponseHelper;
use App\Interfaces\App\Order\OrderInterface;
use App\Jobs\OrderJob;
use App\Models\Order;
use App\Services\Order\OrderService;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class OrderRepository implements OrderInterface
{

    public function fetchAllOrders(int $limit , int $page)
    {
        $userId = Auth::user();
        return Order::where("user_id", $userId)->paginate($limit , ["*"], "page", $page)->withQueryString();
    }

    public function fetchSingle(int $id)
    {
        return Order::find($id);
    }

    public function store(array $data)
    {
        dispatch(new OrderJob($data , Auth::id() , Carbon::now()));
        return ResponseHelper::success("Wait for moment", $data , Response::HTTP_OK);
    }

    public function update(Order $order)
    {
        // TODO: Implement update() method.
    }

    public function delete(Order $order)
    {
        // TODO: Implement delete() method.
    }
}
