<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

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
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../../vendor/almasaeed2010/adminlte/plugins' => public_path('adminlte/plugins'),
            __DIR__.'/../../vendor/almasaeed2010/adminlte/dist' => public_path('adminlte/dist')
        ], 'adminlte');
    }
}
