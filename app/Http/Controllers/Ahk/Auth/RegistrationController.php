<?php

namespace App\Http\Controllers\Ahk\Auth;

use App\Http\Controllers\Ahk\BaseController;
use App\Http\Requests;
use App\Http\Requests\Ahk\StoreSessionRequest;

class RegistrationController extends BaseController
{

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function getRegistration()
	{
		return view('ahk.auth.register');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Requests\Ahk\RegisterUserRequest $request
	 * @return Response
	 */
	public function postRegistration(Requests\Ahk\RegisterUserRequest $request)
	{
	}

}
