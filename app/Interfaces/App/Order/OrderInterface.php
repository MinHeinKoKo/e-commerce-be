<?php

namespace App\Interfaces\App\Order;

use App\Models\Order;

interface OrderInterface {
    public function fetchAllOrders(int $limit , int $page);

    public function fetchSingle(int $id);

    public function store(array $data);

    public function update(Order $order);

    public function delete(Order $order);
}
