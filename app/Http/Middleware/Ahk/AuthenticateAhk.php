<?php

namespace App\Http\Middleware\Ahk;

use App\Ahk\Notifications\Flash;
use App\Ahk\Repositories\User\UserRepository;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class Authenticate.
 */
class AuthenticateAhk
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
     * @param  \Closure                 $next
     * @param Guard|null                $guard
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next, Guard $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                Flash::error(trans('ahk_messages.you_need_to_sign_in'));

                return redirect()->guest(route('auth.sign_in'));
            }
        }

        $user = Auth::user();

        if (! $user->verified) {
            Flash::error(trans('cms.missing_required_role'));

            return redirect()->route('cms.sessions.create');
        }
        if (! $this->userRepository->hasCompanyRepresentativeRole($user)) {
            Flash::error(trans('ahk_messages.you_do_not_have_the_necessary_privileges'));

            return redirect()->route('auth.sign_in');
        }

        return $next($request);
    }
}
