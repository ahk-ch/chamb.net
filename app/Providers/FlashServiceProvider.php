<?php

namespace App\Providers;

use App\Ahk\Notifications\FlashNotifier;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;

class FlashServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('flash', function (Application $app) {
            return $app->make(FlashNotifier::class);
        });
    }
}
