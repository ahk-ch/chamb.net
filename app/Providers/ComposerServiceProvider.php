<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class ComposerServiceProvider.
 */
class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Ahk
        view()->composer('ahk._partials.header_industries_links', 'App\Http\ViewComposers\Ahk\HeaderComposer');
        view()->composer('ahk._partials.header_default_links', 'App\Http\ViewComposers\Ahk\HeaderComposer');
        view()->composer('ahk._partials.header', 'App\Http\ViewComposers\Ahk\HeaderDefaultComposer');
        view()->composer('ahk._partials.footer', 'App\Http\ViewComposers\Ahk\FooterComposer');
        view()->composer('ahk.layouts.master', 'App\Http\ViewComposers\Ahk\MasterComposer');
        view()->composer('ahk.my._partials.left_sidebar', 'App\Http\ViewComposers\Ahk\User\LeftSideBarComposer');

        // ################# Cms ###############
        view()->composer('cms._partials.header', 'App\Http\ViewComposers\Cms\HeaderComposer');
        view()->composer('cms._partials.footer', 'App\Http\ViewComposers\Cms\FooterComposer');
        view()->composer('cms._partials.right_sidebar', 'App\Http\ViewComposers\Cms\RightSideBarComposer');
        view()->composer('cms._partials.left_sidebar', 'App\Http\ViewComposers\Cms\LeftSideBarComposer');
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

