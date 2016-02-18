<?php

namespace App\Http\ViewComposers\Ahk\User;

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   24/11/2015
 */
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;


class LeftSideBarComposer
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