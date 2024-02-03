<?php

namespace App\Interfaces\App\Product;

interface GeneralInterface{
    public function fetchMostSellItems();
    public function fetchAllCategory(int $limit , int $page);
}
