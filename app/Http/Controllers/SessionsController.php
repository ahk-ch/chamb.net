<?php

namespace App\Http\Controllers;

use App\AHK\Notifications\Flash;
use App\Http\Controllers\Admin\BaseController;
use App\Http\Requests;
use App\Http\Requests\StoreSessionRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class SessionsController extends BaseController {

	public function __construct()
	{
		parent::__construct();

		$this->middleware('guest', ['except' => 'destroy']);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param StoreSessionRequest $request
	 * @return Response
	 */
	public function store(StoreSessionRequest $request)
	{
		if ( $user = Auth::attempt($request->only('email', 'password'), $request->has('remember')) )
		{
			Flash::success(trans('ahk.welcome'));

			return redirect()->intended(route('home_path'));
		}

		Flash::error(trans('ahk_messages.credentials_mismatch'));

		return redirect()->back();
	}


	/**
	 * Remove the specified session from storage.
	 *
	 * @return Response
	 */
	public function destroy()
	{
		Auth::logout();

		Flash::success(trans('ahk_messages.credentials_mismatch'));

		return redirect()->route('sessions.create');
	}
}
