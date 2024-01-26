<?php

namespace App\Interfaces\App\Product;

use App\Models\Product;

interface ProductInterface {
    public function fetchAllProducts(int $limit , int $page);
    public function fetchSingleProducts(Product $product);
    public function store(array $data);
    public function update(array $data, Product $product);
    public function delete(Product $product);
}
