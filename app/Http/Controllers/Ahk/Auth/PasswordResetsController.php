<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   22/2/2016
 */

namespace app\Http\Controllers\Ahk\Auth;

use App\Ahk\Notifications\AppMailer;
use App\Ahk\Notifications\Flash;
use App\Ahk\Repositories\User\UserRepository;
use App\Ahk\User;
use App\Http\Controllers\Ahk\BaseController;
use App\Http\Requests\Ahk\PostRecoverAccountRequest;
use App\Http\Requests\Ahk\ResetPasswordRequest;

/**
 * Class PasswordResetsController
 * @package app\Http\Controllers\Ahk\Auth
 */
class PasswordResetsController extends BaseController
{
    /**
     * @var string
     */
    protected $linkRequestView;
    /**
     * @var
     */
    protected $redirectPath;
    /**
     * @var string
     */
    protected $subject;
    /**
     * @var UserRepository
     */
    private $userRepository;
    /**
     * @var AppMailer
     */
    private $mailer;

    /**
     * Create a new password controller instance.
     *
     * PasswordResetsController constructor.
     * @param UserRepository $userRepository
     * @param AppMailer $mailer
     */
    public function __construct(UserRepository $userRepository, AppMailer $mailer)
    {
        parent::__construct();

        $this->middleware('guest');

        $this->userRepository = $userRepository;
        $this->mailer = $mailer;
    }

    public function getEmail()
    {
        return view('ahk.auth.passwords.email');
    }

    public function postEmail(PostRecoverAccountRequest $request)
    {
        $user = $this->userRepository->findByEmail($request->get('email'));

        $user = $this->userRepository->generateRecoveryToken($user);

        $this->mailer->sendRecoveryEmail($user);

        Flash::success(trans('ahk_messages.check_your_email_to_recover_account'));

        return redirect()->back();
    }

    public function getReset($slug, $recovery_token)
    {
        $user = $this->userRepository->findBySlugAndRecoveryToken($slug, $recovery_token);

        if (!$user) {
            Flash::error('ahk_messages.validation_error_occurred');

            return redirect()->route('auth.sign_in');
        }

        return view('ahk.auth.passwords.reset', compact('slug', 'recovery_token'));
    }

    public function postReset($slug, $recovery_token, ResetPasswordRequest $request)
    {
        $user = $this->userRepository->findBySlugAndRecoveryToken($slug, $recovery_token);

        if (!$user) {
            Flash::error('ahk_messages.validation_error_occurred');

            return redirect()->back();
        }

        $user = $this->userRepository->updatePassword($user, $request->get(User::PASSWORD));

        if (!$user) {
            Flash::error(trans('ahk_messages.unknown_error_occurred'));
        } else {
            Flash::success(trans('ahk_messages.you_updated_your_accounts_password'));
        }

        return redirect()->route('auth.sign_in');
    }
}

