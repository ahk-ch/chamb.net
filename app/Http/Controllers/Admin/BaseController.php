<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Support\Facades\App;

class BaseController extends Controller {

	/**
	 * BaseController constructor.
	 */
	public function __construct()
	{
		! session('locale') ?: App::setLocale(session('locale'));

		$this->middleware('auth');
	}
}
