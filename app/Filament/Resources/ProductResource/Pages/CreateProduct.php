<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use App\Models\Product;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Database\Eloquent\Model;

class CreateProduct extends CreateRecord
{
    protected static string $resource = ProductResource::class;

//    protected function handleRecordCreation(array $data): Model
//    {
//        $image = $data['url'];
//        unset($data['url']);
//        $product = Product::create($data);
//        $product->image()->create([
//            "url" => $image
//        ]);
//
//        Notification::make()
//            ->title('New Product Is Created')
//            ->icon('heroicon-o-shopping-bag')
//            ->body("** {$product->name} is created **")
//            ->sendToDatabase(auth()->user());
//
//        return $product;
//    }

}
