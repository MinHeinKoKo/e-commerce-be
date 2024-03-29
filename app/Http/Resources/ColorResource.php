<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ColorResource extends JsonResource
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
            'colorName' => $this->colorName,
            'hexCode' => $this->hexCode,
            'createdAt' => Carbon::parse($this->created_at)->format("Y m d : H:i:s")
        ];
    }
}
