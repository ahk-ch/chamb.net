<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider {
	/**
	 * Bootstrap the application services.
	 *
	 * @return void
	 */
	public function boot()
	{
		view()->composer(
			'_partials.header', 'App\Http\ViewComposers\HeaderComposer'
		);

		view()->composer(
			'admin._partials.header', 'App\Http\ViewComposers\Admin\HeaderComposer'
		);

		view()->composer(
			'admin._partials.right_sidebar', 'App\Http\ViewComposers\Admin\RightSideBarComposer'
		);

	}

	/**
	 * Register the application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}
}
