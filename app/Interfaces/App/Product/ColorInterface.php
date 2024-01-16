<?php

namespace App\Interfaces\App\Product;

use App\Models\Color;



interface ColorInterface {
    public function fetchAllColors(int $limit , int $page);

    public function fetchSingleColor(Color $color);

    public function store(array $data);

    public function update(array $data, Color $color);

    public function delete(Color $color);
}
