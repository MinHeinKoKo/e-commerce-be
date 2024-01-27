<?php


namespace App\UseCases\App\Order;


use App\Interfaces\App\Order\OrderInterface;
use App\Models\Order;
use App\Models\Receipt;

class OrderAction
{
    private $orderRepository;

    public function __construct(OrderInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function fetchAll()
    {
        $limit = request()->limit ?? 10;
        $page = request()->page ?? 1;
        return $this->orderRepository->fetchAllOrders($limit , $page);
    }

    public function store(array $data)
    {
        return $this->orderRepository->store($data);
    }

    public function fetchSingleReceipt(Order $order)
    {
        return $this->orderRepository->fetchSingle($order);
    }
}
