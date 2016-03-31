<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   24/11/2015
 */
namespace App\Http\ViewComposers\Ahk;

use App\Ahk\Helpers\Utilities;
use Illuminate\Contracts\View\View;

/**
 * Class FooterComposer.
 */
class FooterComposer
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
        $utilities = new Utilities();

        $view->with('copyrightDate', $utilities->autoCopyright('2015'));
    }
}
