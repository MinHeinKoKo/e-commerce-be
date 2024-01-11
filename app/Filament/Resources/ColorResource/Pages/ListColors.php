<?php

namespace App\Filament\Resources\ColorResource\Pages;

use App\Filament\Resources\ColorResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListColors extends ListRecords
{
    protected static string $resource = ColorResource::class;

    protected function getHeaderWidgets(): array
    {
        return ColorResource::getWidgets();
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
