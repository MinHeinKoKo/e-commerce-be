<?php

namespace App\Http\Controllers\Api\App;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderRequest;
use App\Http\Resources\ReceiptResource;
use App\Models\Product;
use App\Rules\CheckOrderQuantity;
use App\UseCases\App\Order\OrderAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    protected $orderAction;

    public function __construct(OrderAction  $orderAction)
    {
        $this->orderAction = $orderAction;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = $this->orderAction->fetchAll();
        return response()->json([
            "message" => "successfully fetched",
            "data" => ReceiptResource::collection($orders),
            "meta" => ResponseHelper::getPaginationMeta($orders)
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OrderRequest $request)
    {
        return $this->orderAction->store($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

}
