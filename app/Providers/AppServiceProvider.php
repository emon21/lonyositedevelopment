<?php

namespace App\Providers;

use App\Models\WebSiteSetting;
use Illuminate\Support\Facades\View;
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
        //

        # Website Setting
        $settings = WebSiteSetting::pluck('value', 'key')->toArray();
        View::share('settings', $settings);
    }
}
