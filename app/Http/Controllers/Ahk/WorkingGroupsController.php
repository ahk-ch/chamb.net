<?php

namespace App\Http\Controllers\Ahk;

use App\Http\Controllers\Controller;
use App\Http\Requests;

/**
 * Class WorkingGroupsController
 * @package App\Http\Controllers\Ahk
 */
class WorkingGroupsController extends Controller
{
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view('ahk.health.work-groups');
	}
}
