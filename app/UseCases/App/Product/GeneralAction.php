<?php


namespace App\UseCases\App\Product;


use App\Interfaces\App\Product\GeneralInterface;

class GeneralAction
{
    private $generalRepository;

    public function __construct(GeneralInterface $generalRepository)
    {
        $this->generalRepository = $generalRepository;
    }

    public function fetchAllCategory()
    {
        $limits = request()->limit ?? 10;
        $page = request()->page ?? 1;
        return $this->generalRepository->fetchAllCategory($limits , $page);
    }

    public function fetchMostSellItems()
    {
        return $this->generalRepository->fetchMostSellItems();
    }

}
