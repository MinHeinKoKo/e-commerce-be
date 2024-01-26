<?php

namespace App\Providers;

use App\Interfaces\App\Order\OrderInterface;
use App\Interfaces\App\Product\ProductInterface;
use App\Repositories\App\Order\OrderRepository;
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
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
