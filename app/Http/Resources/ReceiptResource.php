<?php

namespace App\Http\Resources;

use App\Http\Resources\Auth\UserResoure;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use function Symfony\Component\Translation\t;

class ReceiptResource extends JsonResource
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
//            "user" => $this->user,
            "user" => new UserResoure($this->user),
            "total" => $this->total,
            "createdAt" => Carbon::parse($this->created_at)->format("Y m d"),
            "orders" => OrderResource::collection($this->orders)
        ];
    }
}
