<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;

class UsersController extends BaseController {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function subscribers()
	{
		return view('admin.users.subscribers.index');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function administrators()
	{
		return view('admin.users.administrators.index');
	}
}
