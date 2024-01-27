<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DiscountResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "code" => $this->code,
            "description" => $this->description,
            "type" => $this->discount_type,
            "amount" => $this->amount,
            "startAt" => $this->start_at,
            "expresAt" => $this->expires_at,
            "createdAt" => Carbon::parse($this->created_at)->format("Y m d")
        ];
    }
}
