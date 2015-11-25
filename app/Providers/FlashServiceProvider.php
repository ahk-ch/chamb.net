<?php

namespace App\Providers;

use App\AHK\Notifications\FlashNotifier;
use Illuminate\Support\ServiceProvider;

class FlashServiceProvider extends ServiceProvider {
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
		$this->app->singleton('flash', function ($app)
		{
			return $app->make(FlashNotifier::class);
		});
	}
}
