<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

class SettingsController extends Controller {
	/**
	 * Change the language of the app.
	 *
	 * @param Requests\Admin\SetLanguageRequest $request
	 * @return \Illuminate\Http\Response
	 */
	public function setLocale(Requests\Admin\SetLanguageRequest $request)
	{
		session(['locale' => $request->get('lang')]);

		return redirect()->back();
	}
}
