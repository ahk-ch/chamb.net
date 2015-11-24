<?php

namespace App\Http\Controllers;

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
		return view('home');
	}

	/**
	 * Display the about resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function about()
	{
		return view('about');
	}

	/**
	 * Display the health resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function health()
	{
		return view('health');
	}

	/**
	 * Display the companies resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function companies()
	{
		return view('companies');
	}
}
