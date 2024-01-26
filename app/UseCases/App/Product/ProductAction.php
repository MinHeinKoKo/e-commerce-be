<?php


namespace App\UseCases\App\Product;


use App\Interfaces\App\Product\ProductInterface;
use App\Models\Product;

class ProductAction
{
    private $productRepository;

    public function __construct(ProductInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function fetchAllProduct()
    {
        $limit = request()->limit ?? 10;
        $page = request()->page ?? 1;
        return $this->productRepository->fetchAllProducts($limit, $page);
    }

    public function fetchSingleProduct(Product $product)
    {
        return $product;
    }

    public function store(array $data)
    {
        return $this->productRepository->store($data);
    }

    public function update(array $data, Product $product)
    {
        return $this->productRepository->update($data, $product);
    }

    public function delete(Product $product)
    {
        return $this->productRepository->delete($product);
    }

}
