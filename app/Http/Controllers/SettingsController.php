<?php

namespace App\Http\Controllers;

/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @version 7/24/2015
 */

use App\Http\Requests;

class SettingsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @param Requests\SetLanguageRequest $request
	 * @return \Illuminate\Http\Response
	 */
	public function setLocale(Requests\SetLanguageRequest $request)
	{
		session(['locale' => $request->get('lang')]);

		return redirect()->back();
	}
}
