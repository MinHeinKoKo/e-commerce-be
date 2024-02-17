<?php

namespace App\Filament\Widgets;


use App\Models\Category;
use App\Models\Product;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class CategoryChart extends ChartWidget
{
    protected static ?string $heading = 'Chart';
    protected static ?int $sort = 3;

    protected function getData(): array
    {
        $data = Category::withCount(['products'])->get();
        return [
            'datasets' => [
                [
                    'label' => 'Category',
                    'data' => $data->map(fn($value) => $value->products_count),
                ],
            ],
            'labels' => $data->map(fn($value) => $value->title),
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
