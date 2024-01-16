<?php


namespace App\Repositories\App\Product;


use App\Interfaces\App\Product\ColorInterface;
use App\Models\Color;


class ColorRepository implements ColorInterface
{

    public function fetchAllColors(int $limit, int $page)
    {
        return Color::paginate($limit,['*'],'page',$page)->withQueryString();
    }

    public function fetchSingleColor(Color $color)
    {
        return $color;
    }

    public function store(array $data)
    {
        return Color::create($data);
    }

    public function update(array $data, Color $color)
    {
        return $color->update($data);
    }

    public function delete(Color $color)
    {
        return $color->delete();
    }
}
