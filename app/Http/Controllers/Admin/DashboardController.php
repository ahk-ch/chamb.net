<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;

class DashboardController extends BaseController {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function dashboard()
	{
		return view('admin.blank');
	}
}

