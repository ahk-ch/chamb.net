<?php

namespace App\Http\Controllers\Ahk\Auth;

use App\Ahk\Notifications\Flash;
use App\Ahk\Repositories\User\UserRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

/**
 * Login, Logout, and register a company representative account.
 * Class AuthenticationController.
 */
class AuthenticationController extends Controller
{
    use ThrottlesLogins;

    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * AuthenticationController constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->middleware('ahk.guest', ['except' => 'destroy']);

        $this->userRepository = $userRepository;
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
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function postLogin(Requests\Ahk\SignInRequest $request)
    {
        if ($this->userRepository->attemptToSignIn($request->only('email', 'password'), $request->has('remember_me'))
            && $this->userRepository->hasCompanyRepresentativeRole(Auth::user())
        ) {

            Flash::success(trans('ahk_messages.successful_sign_in'));

            return redirect()->intended(route('home_path'));
        }

        Auth::logout();

        Flash::error(trans('ahk_messages.you_do_not_have_the_necessary_privileges'));

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

        Flash::success(trans('ahk_messages.successful_sign_out'));

        return redirect()->route('home_path');
    }
}
