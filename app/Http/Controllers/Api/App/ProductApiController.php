<?php

namespace App\Http\Controllers\Api\App;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\UseCases\App\Product\ProductAction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductApiController extends Controller
{
    protected $productAction;

    public function __construct(ProductAction $productAction)
    {
        $this->productAction = $productAction;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->productAction->fetchAllProduct();
        return response()->json([
            "message" => "Products are fetched successfully.",
            "data" => ProductResource::collection($data),
            "meta" => ResponseHelper::getPaginationMeta($data),
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->productAction->store($request->all());
        return ResponseHelper::success("Successfully created",null, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return ResponseHelper::success("Successfully fetched", new ProductResource($product), Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $this->productAction->update($request->all(),$product);
        return ResponseHelper::success("Successfully updated",null, Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $this->productAction->delete($product);
        return ResponseHelper::success("Successfully Deleted",null, Response::HTTP_OK);

    }
}
