<?php

namespace App\Providers;

use App\Ahk\Helpers\Utilities;
use Illuminate\Support\ServiceProvider;

/**
 * Class AppServiceProvider.
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('utilities', new Utilities());
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }
}

