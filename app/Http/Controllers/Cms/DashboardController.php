<?php

namespace App\Http\Controllers\Cms;

use App\Http\Requests;

class DashboardController extends BaseController
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function dashboard()
	{
		return view('cms.blank');
	}
}

