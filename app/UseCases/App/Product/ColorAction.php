<?php


namespace App\UseCases\App\Product;


use App\Interfaces\App\Product\ColorInterface;
use App\Models\Color;

class ColorAction
{
    private $colorRepository;

    public function __construct(ColorInterface $colorRepository)
    {
        $this->colorRepository = $colorRepository;
    }

    public function fetchAllColors()
    {
        $limit = request()->limit ?? 10;
        $page = request()->page ?? 1 ;
        return $this->colorRepository->fetchAllColors($limit, $page);
    }

    public function fetchSingleColor(Color $color)
    {
        return $this->colorRepository->fetchSingleColor($color);
    }

    public function store(array $data)
    {
        return $this->colorRepository->store($data);
    }

    public function update(array $data , Color $color)
    {
        return $this->colorRepository->update($data, $color);
    }

    public function delete(Color $color)
    {
        return $this->colorRepository->delete($color);
    }

}
