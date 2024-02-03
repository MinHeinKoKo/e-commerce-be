<?php

namespace App\Providers;

use App\Interfaces\App\Discount\DicountInterface;
use App\Interfaces\App\Order\OrderInterface;
use App\Interfaces\App\Product\GeneralInterface;
use App\Interfaces\App\Product\ProductInterface;
use App\Repositories\App\Discount\DiscountRepository;
use App\Repositories\App\Order\OrderRepository;
use App\Repositories\App\Product\GeneralRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            OrderInterface::class, OrderRepository::class
        );
        $this->app->bind(
            DicountInterface::class , DiscountRepository::class
        );
        $this->app->bind(
            GeneralInterface::class , GeneralRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
