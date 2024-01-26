<?php

namespace App\Filament\Resources\DiscountResource\Pages;

use App\Filament\Resources\DiscountResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateDiscount extends CreateRecord
{
    protected static string $resource = DiscountResource::class;

//    protected function mutateFormDataBeforeCreate(array $data): array
//    {
//        $data['code']  = Str::random(20);
////        dd($data);
//        return $data;
//    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['code'] = Str::random(20);

        return $data;
    }
}
