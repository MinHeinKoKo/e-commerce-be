<?php

namespace App\Http\Controllers\Api\App\Guest;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\UseCases\App\Product\GeneralAction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class GeneralApiController extends Controller
{
    protected $generalAction;

    public function __construct(GeneralAction $generalAction)
    {
        $this->generalAction = $generalAction;
    }

    public function fetchMostSellItems()
    {
        $data = $this->generalAction->fetchMostSellItems();
        return response()->json([
            "message" => "fetched successfully",
            "data" => ProductResource::collection($data),
            "meta" => ResponseHelper::getPaginationMeta($data)
        ], Response::HTTP_OK);
    }

    public function fetchAllCategories()
    {
        $data = $this->generalAction->fetchAllCategory();
        return response()->json([
            "message" => "fetched successfully",
            "data" => CategoryResource::collection($data),
            "meta" => ResponseHelper::getPaginationMeta($data)
        ], Response::HTTP_OK);
    }
}
