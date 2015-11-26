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
		# AHK
		view()->composer(
			'ahk._partials.header', 'App\Http\ViewComposers\AHK\HeaderComposer'
		);

		# Admin
		view()->composer(
			'admin._partials.header', 'App\Http\ViewComposers\Admin\HeaderComposer'
		);

		view()->composer(
			'admin._partials.right_sidebar', 'App\Http\ViewComposers\Admin\RightSideBarComposer'
		);

		view()->composer(
			'admin._partials.left_sidebar', 'App\Http\ViewComposers\Admin\LeftSideBarComposer'
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
