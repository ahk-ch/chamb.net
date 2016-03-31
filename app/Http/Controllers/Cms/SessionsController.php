<?php

namespace App\Http\Controllers\Cms;

use App\Ahk\Notifications\Flash;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cms\StoreSessionRequest;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

/**
 * Class SessionsController.
 */
class SessionsController extends Controller
{
    /**
     * SessionsController constructor.
     */
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
        return view('cms.sign_in');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSessionRequest $request
     *
     * @return Response
     */
    public function store(StoreSessionRequest $request)
    {
        if (Auth::attempt($request->only('email', 'password'), $request->has('remember'))) {

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
