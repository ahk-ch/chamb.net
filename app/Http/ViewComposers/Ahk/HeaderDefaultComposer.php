<?php

namespace App\Http\ViewComposers\Ahk;

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   24/11/2015
 */
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;


class HeaderDefaultComposer
{

	/**
	 * Bind data to the view.
	 *
	 * @param  View $view
	 * @return void
	 */
	public function compose(View $view)
	{
		$view->with('user', Auth::user());
	}
}

