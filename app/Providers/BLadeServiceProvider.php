<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BLadeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Blade::directive('permission', function ($expression) {
            return "<?php if (auth()->check() && auth()->user()->hasPermission($expression)) : ?>";
        });

        Blade::directive('endpermission', function () {
            return "<?php endif; ?>";
        });
    }
}
