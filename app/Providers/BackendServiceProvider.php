<?php

namespace App\Providers;

use App\AHK\Repositories\User\DbUserRepository;
use App\AHK\Repositories\User\UserRepository;
use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider {
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
		$this->app->bind(UserRepository::class, DbUserRepository::class);
	}
}