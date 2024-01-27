<?php


namespace App\UseCases\App\Discount;


use App\Interfaces\App\Discount\DicountInterface;

class DicountAction
{
    private $discountRepository;
    public function __construct(DicountInterface $discountRepository)
    {
        $this->discountRepository = $discountRepository;
    }

    public function fetchActiveCoupon()
    {
        return $this->discountRepository->fetchActiveDiscount();
    }
}
