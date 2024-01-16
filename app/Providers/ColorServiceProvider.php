<?php

namespace App\Providers;

use App\Interfaces\App\Product\ColorInterface;
use App\Repositories\App\Product\ColorRepository;
use Illuminate\Support\ServiceProvider;


class ColorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            ColorInterface::class , ColorRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
