<?php

namespace App\Http\Controllers\Ahk;

/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @version 7/24/2015
 */

use App\Http\Requests;
use App\Http\Requests\Ahk\SetLanguageRequest;

class SettingsController extends BaseController {

	/**
	 * Change the language of the app.
	 *
	 * @param SetLanguageRequest $request
	 * @return \Illuminate\Http\Response
	 */
	public function setLocale(SetLanguageRequest $request)
	{
		session(['locale' => $request->get('lang')]);

		return redirect()->back();
	}
}