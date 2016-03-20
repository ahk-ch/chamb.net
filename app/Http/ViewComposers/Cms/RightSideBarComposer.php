<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   24/11/2015
 */
namespace app\Http\ViewComposers\Cms;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\App;

/**
 * Class RightSideBarComposer.
 */
class RightSideBarComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View $view
     *
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('locale', App::getLocale());
    }
}

