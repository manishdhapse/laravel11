<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        // For pagination
        Paginator::useBootstrapFive();
        // For Money
        setlocale(LC_MONETARY, 'en_US.UTF-8');
    }
}
