<?php

namespace App\Http\Controllers\AHK;

use App\AHK\Notifications\Flash;
use App\Http\Requests;
use App\Http\Requests\StoreSessionRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

/**
 * Login, Logout, and register a company representative account.
 * Class AuthenticationController
 * @package App\Http\Controllers\AHK
 */
class AuthenticationController extends BaseController
{

	/**
	 * AuthenticationController constructor.
	 */
	public function __construct()
	{
		parent::__construct();

		$this->middleware('guest', ['except' => 'destroy']);
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function getLogin()
	{
		return view('ahk.auth.sign_in');
	}

	/**
	 * @param Requests\Ahk\SignInRequest $request
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function postLogin(Requests\Ahk\SignInRequest $request)
	{
		if ( $user = Auth::attempt($request->only('email', 'password'), $request->has('remember_me')) )
		{
			Flash::success(trans('ahk_messages.successful_sign_in'));

			return redirect()->intended(route('home_path'));
		}

		Flash::error('Those credentials do not match our data set.');

		return redirect()->back();
	}

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

		Flash::success(trans('ahk_messages.successful_logout'));

		return redirect()->route('home_path');
	}
}
