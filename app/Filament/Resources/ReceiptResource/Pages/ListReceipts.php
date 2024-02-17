<?php

namespace App\Filament\Resources\ReceiptResource\Pages;

use App\Filament\Resources\ReceiptResource;
use App\Models\Receipt;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListReceipts extends ListRecords
{
    protected static string $resource = ReceiptResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    public function getTabs(): array
    {
        return [
            "All" => Tab::make(),
            "Pending" => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where("process", "=" , "Pending"))
                ->badge(Receipt::query()->where("process", "=" , "Pending")->count()),
            "Approved" => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where("process", "=" , "Approved"))
                ->badge(Receipt::query()->where("process", "=" , "Approved")->count()),
            "Denied" => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where("process", "=" , "Denied"))
                ->badge(Receipt::query()->where("process", "=" , "Denied")->count()),
            "Cancel" => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where("process", "=" , "Cancel"))
                ->badge(Receipt::query()->where("process", "=" , "Cancel")->count()),
        ];
    }
}
