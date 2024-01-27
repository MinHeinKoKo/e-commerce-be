<?php


namespace App\Repositories\App\Discount;


use App\Interfaces\App\Discount\DicountInterface;
use App\Models\Discount;
use Carbon\Carbon;

class DiscountRepository implements DicountInterface
{

    public function fetchActiveDiscount()
    {
        $today = Carbon::now();
        return Discount::orWhere("start_at", "<=", $today)->orWhere("expires_at", ">=", $today)->where("status", true)->where("is_visible", true)->first();
    }
}
