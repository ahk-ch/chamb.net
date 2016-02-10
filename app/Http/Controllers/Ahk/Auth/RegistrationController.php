<?php

namespace App\Http\Controllers\Ahk\Auth;

use App\Ahk\Notifications\Flash;
use App\Ahk\Notifications\Mailer;
use App\Ahk\Repositories\User\UserRepository;
use App\Http\Controllers\Ahk\BaseController;
use App\Http\Requests;
use Illuminate\Http\Response;

/**
 * Class RegistrationController
 * @package App\Http\Controllers\Ahk\Auth
 */
class RegistrationController extends BaseController
{
	/**
	 * @var UserRepository
	 */
	protected $userRepository;
	/**
	 * @var Mailer
	 */
	private $mailer;

	/**
	 * @param UserRepository $userRepository
	 * @param Mailer $mailer
	 */
	public function __construct(UserRepository $userRepository, Mailer $mailer)
	{
		parent::__construct();

		$this->middleware('guest');

		$this->userRepository = $userRepository;

		$this->mailer = $mailer;
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
	 * @param Requests\Ahk\StoreUserRequest $request
	 * @return Response
	 */
	public function postRegistration(Requests\Ahk\StoreUserRequest $request)
	{
		if ( ! $userIsStored = $this->userRepository->store($request->only('email', 'password')) )
		{
			Flash::error(trans('ahk_messages.unable_to_store_user'));

			return redirect()->back();
		}

		Flash::success(trans('ahk_messages.user_created'));

		if ( ! $this->mailer->sendEmailConfirmation($userIsStored) ) return redirect()->back();

		Flash::success(trans('ahk_messages.check_your_email_and_complete_registration'));

		return redirect()->route('home_path');
	}

}
