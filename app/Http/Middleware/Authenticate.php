<?php

namespace App\Http\Middleware;

use App\Ahk\Notifications\Flash;
use App\Ahk\Repositories\User\UserRepository;
use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
	/**
	 * @var UserRepository
	 */
	private $userRepository;

	public function __construct(UserRepository $userRepository)
	{
		$this->userRepository = $userRepository;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Closure $next
	 * @param null $guard
	 * @return mixed
	 */
	public function handle($request, Closure $next, $guard = null)
	{
		if ( Auth::guard($guard)->guest() )
		{
			if ( $request->ajax() )
			{
				return response('Unauthorized.', 401);
			} else
			{
				Flash::error(trans('ahk_messages.you_need_to_sign_in'));

				return redirect()->guest(route('auth.sign_in'));
			}
		}

		if ( ! $this->userRepository->hasCompanyRepresentativeRole(Auth::user()) )
		{
			Flash::error(trans('ahk_messages.you_do_not_have_the_necessary_privileges'));

			return redirect()->route('home_path');
		}

		return $next($request);
	}
}
