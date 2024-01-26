<?php

namespace App\Http\Controllers\Api\App\Guest;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuestApiController extends Controller
{
    public function fetchMostSellItems()
    {
        return Product::select("products.*" , DB::raw("SUM(orders.quantity) as total_orders"))
            ->leftJoin("orders", "products.id" , "=", "orders.product_id")
            ->groupBy("products.id")
            ->orderBy("total_orders" , "DESC")
            ->get();
    }
}
