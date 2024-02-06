<?php


namespace App\Repositories\App\Product;


use App\Interfaces\App\Product\ProductInterface;
use App\Models\Product;

class ProductRepository implements ProductInterface
{

    public function fetchAllProducts(int $limit, int $page)
    {
        return Product::where('quantity',">",5)
            ->where('is_published',1)->where('is_visible',1)
            ->when(request('keyword'), function($q){
            $keyword = request('keyword');
            $q->orWhere('name',"LIKE","%$keyword%")
                ->orWhere('description', "LIKE", "%$keyword%");
            })
            ->when(request()->has('categoryName') && request('categoryName') !== null , function ($c) {
                $category = request("categoryName");
                $c->whereHas("category" , function ($q) use($category){
                    $q->where("slug" , $category);
                });
            })
            ->paginate($limit, ['*'],'page',$page)->withQueryString();
    }

    public function fetchSingleProducts(Product $product)
    {
        return $product;
    }

    public function store(array $data)
    {
        return Product::create($data);
    }

    public function update(array $data, Product $product)
    {
        return $product->update($data);
    }

    public function delete(Product $product)
    {
        return $product->delete();
    }
}
