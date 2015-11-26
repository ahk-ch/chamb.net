<?php

namespace App\Http\Controllers\AHK;

/**
 * Home controller.
 *
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   23/11/2015
 */

use App\Http\Requests;

class HomeController extends BaseController {

	/**
	 * Display the home resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function home()
	{
		return view('ahk.home');
	}

	/**
	 * Display the about resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function about()
	{
		return view('ahk.about');
	}

	/**
	 * Display the health resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function health()
	{
		return view('ahk.health');
	}

	/**
	 * Display the companies resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function companies()
	{
		return view('ahk.companies');
	}
}
