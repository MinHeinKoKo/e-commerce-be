<?php


namespace App\UseCases\App\Order;


use App\Interfaces\App\Order\OrderInterface;

class OrderAction
{
    private $orderRepository;

    public function __construct(OrderInterface $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function store(array $data)
    {
        return $this->orderRepository->store($data);
    }
}
