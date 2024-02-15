<?php

namespace App\Http\Controllers\Api\App;

use App\Helpers\ResponseHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ColorRequest;
use App\Http\Resources\ColorResource;
use App\Models\Color;
use App\UseCases\App\Product\ColorAction;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ColorApiController extends Controller
{
    protected $colorAction;

    public function __construct(ColorAction $colorAction)
    {
        $this->colorAction = $colorAction;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->colorAction->fetchAllColors();
        return response()->json([
            "message" => "Fetched Successfully.",
            "data" => ColorResource::collection($data),
            "meta" => ResponseHelper::getPaginationMeta($data)
        ], Response::HTTP_OK);
//        return ResponseHelper::success('Fetched Successfully.', ColorResource::collection($data) , Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ColorRequest $request)
    {
        $this->authorize('create' , Color::class);
        $this->colorAction->store($request->all());
        return ResponseHelper::success('Created Successfully.',null, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Color $color)
    {
        return ResponseHelper::success("fetched successfully.", new ColorResource($color), Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ColorRequest $request, Color $color)
    {
        $this->authorize('update',$color);
        $this->colorAction->update($request->all(),$color);
        return ResponseHelper::success('Updated Successfully.', null, Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Color $color)
    {
        return $this->colorAction->delete($color);
    }
}
