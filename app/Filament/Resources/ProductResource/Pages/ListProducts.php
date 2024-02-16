<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use App\Models\Product;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListProducts extends ListRecords
{
    protected static string $resource = ProductResource::class;

    protected function getHeaderWidgets(): array
    {
        return ProductResource::getWidgets();
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'All' => Tab::make(),
            'Published' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('is_published', true))
                ->badge(Product::query()->where('is_published', true)->count()),
            'Visible' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('is_visible', true))
                ->badge(Product::query()->where('is_visible', true)->count()),
            'Low Quantity' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('quantity', "<=" , 20))
                ->badge(Product::query()->where('quantity', "=" , 20)->count())->badgeColor('danger'),
        ];
    }
}
