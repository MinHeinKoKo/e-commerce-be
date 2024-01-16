<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'excerpt' => $this->excerpt,
            'price' => $this->price,
            'quantity' => $this->quantity,
            'qty' => 1,
            'category' => $this->category->title,
            'size' => $this->size->sizeName,
            'color' => $this->color->colorName,
            'colorCode' => $this->color->hexCode,
            'createdAt' => Carbon::parse($this->created_at)->format("Y m d H:i:s")
        ];
    }
}
