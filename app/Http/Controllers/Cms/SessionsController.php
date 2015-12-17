<?php

namespace App\Http\Controllers\Cms;

use App\AHK\Notifications\Flash;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Cms\StoreSessionRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{

	public function __construct()
	{
		$this->middleware('cms.guest', ['except' => 'destroy']);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('cms.login');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param StoreSessionRequest $request
	 * @return Response
	 */
	public function store(StoreSessionRequest $request)
	{
		if ( $user = Auth::attempt($request->only('username', 'password'), $request->has('remember')) )
		{
			Flash::success('Welcome!');

			return redirect()->intended(route('cms.dashboard'));
		}

		Flash::error('Those credentials do not match our data set.');

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

		Flash::success('You have successfully signed out!');

		return redirect()->route('cms.sessions.create');
	}
}
