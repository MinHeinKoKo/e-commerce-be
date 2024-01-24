<?php


namespace App\Repositories\App\Order;


use App\Interfaces\App\Order\OrderInterface;
use App\Models\Order;
use App\Services\Order\OrderService;
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
        return OrderService::calculateTotalPrice($data);
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
