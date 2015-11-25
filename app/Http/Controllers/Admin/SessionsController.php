<?php

namespace App\Http\Controllers\Admin;

use App\AHK\Notifications\Flash;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\Admin\StoreSessionRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller {

	public function __construct()
	{
		$this->middleware('admin.guest', ['except' => 'destroy']);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.login');
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

			return redirect()->intended(route('admin.dashboard'));
		}

		Flash::error('Those credentials do not match our data set.');

		return redirect()->back();
	}
}
