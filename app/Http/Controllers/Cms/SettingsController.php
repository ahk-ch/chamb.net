<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use App\Http\Requests;

class SettingsController extends Controller {
	/**
	 * Change the language of the app.
	 *
	 * @param Requests\Cms\SetLanguageRequest $request
	 * @return \Illuminate\Http\Response
	 */
	public function setLocale(Requests\Cms\SetLanguageRequest $request)
	{
		session(['locale' => $request->get('lang')]);

		return redirect()->back();
	}
}
