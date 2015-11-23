<?php

namespace App\Http\Controllers;

/**
 * Health controller.
 *
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   23/11/2015
 */

use App\Http\Requests;

class HealthController extends Controller {
	/**
	 * Display a listing of the info resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function info()
	{
		return view('health.info');
	}

	/**
	 * Display a listing of the news resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function news()
	{
		return view('health.news');
	}
}
