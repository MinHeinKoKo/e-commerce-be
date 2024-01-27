<?php

namespace App\Interfaces\App\Order;

use App\Models\Order;
use App\Models\Receipt;

interface OrderInterface {
    public function fetchAllOrders(int $limit , int $page);

    public function fetchSingle(Order $order);

    public function store(array $data);
}
