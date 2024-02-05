<?php


namespace App\Repositories\App\Product;


use App\Interfaces\App\Product\GeneralInterface;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class GeneralRepository implements GeneralInterface
{

    public function fetchMostSellItems()
    {
        return Product::select("products.*" , DB::raw("SUM(orders.quantity) as total_orders"))
            ->leftJoin("orders", "products.id" , "=", "orders.product_id")
            ->groupBy("products.id")
            ->orderBy("total_orders" , "DESC")
            ->limit(8)
            ->get();
    }

    public function fetchAllCategory(int $limit , int $page)
    {
        return Category::paginate($limit , ['*'], "page" , $page)->withQueryString();
    }
}
