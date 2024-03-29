<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Color;
use App\Models\Order;
use App\Policies\ColorPolicy;
use App\Policies\OrderPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
//        Color::class => ColorPolicy::class
//        Order::class => OrderPolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
