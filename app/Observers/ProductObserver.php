<?php

namespace App\Observers;

use App\Models\Product;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     */
    public function created(Product $product): void
    {
        Notification::make()
            ->title("A new product is created".$product->name)
            ->sendToDatabase(Auth::user());
    }
}
