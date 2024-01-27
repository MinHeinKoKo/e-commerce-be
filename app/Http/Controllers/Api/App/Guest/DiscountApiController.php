<?php

namespace App\Http\Controllers\Api\App\Guest;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\DiscountResource;
use App\UseCases\App\Discount\DicountAction;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Response;

class DiscountApiController extends Controller
{
    protected $discountAction;
    public function __construct(DicountAction $dicountAction)
    {
        $this->discountAction = $dicountAction;
    }

    public function index()
    {
        $discount = $this->discountAction->fetchActiveCoupon();
        if (!$discount){
            return ResponseHelper::success("Fetched Successfully", null , Response::HTTP_OK);
        }
        return ResponseHelper::success("Fetched Successfully", new DiscountResource($discount) , Response::HTTP_OK);
    }
}
