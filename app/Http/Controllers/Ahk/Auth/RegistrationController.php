<?php

namespace App\Http\Controllers\Ahk\Auth;

use App\Ahk\Notifications\AppMailer;
use App\Ahk\Notifications\Flash;
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
	 * @var AppMailer
	 */
	private $appMailer;

	/**
	 * @param UserRepository $userRepository
	 * @param AppMailer $appMailer
	 * @internal param AppMailer $mailer
	 */
	public function __construct(UserRepository $userRepository, AppMailer $appMailer)
	{
		parent::__construct();

		$this->middleware('guest');

		$this->userRepository = $userRepository;

		$this->appMailer = $appMailer;
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
		$userIsStored = $this->userRepository->storeCompanyRepresentativeAccount($request->only('email', 'password'));

		if ( ! $userIsStored )
		{
			Flash::error(trans('ahk_messages.unable_to_store_user'));

			return redirect()->back();
		}

		Flash::success(trans('ahk_messages.user_created'));

		if ( ! $this->appMailer->sendEmailConfirmation($userIsStored) ) return redirect()->back();

		Flash::success(trans('ahk_messages.check_your_email_and_complete_registration'));

		return redirect()->route('auth.sign_in');
	}

	public function confirmEmail(Requests\Ahk\ConfirmEmailRequest $request)
	{
		 $this->userRepository->confirmEmail($request->only('token'));

		Flash::success(trans('ahk_messages.successful_sign_up'));

		return redirect()->route('home_path');
	}

}
