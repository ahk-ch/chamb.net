<?php

namespace App\Http\Middleware\Cms;

use App\Ahk\Notifications\Flash;
use App\Ahk\Repositories\User\UserRepository;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class Authenticate.
 */
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
     * @param  \Closure                 $next
     * @param Guard                     $guard
     *
     * @return mixed
     */
    public function handle(Request $request, Closure $next, Guard $guard = null)
    {
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                Flash::error(trans('cms.you_need_to_sign_in_first'));

                return redirect()->guest(route('cms.sessions.create'));
            }
        }

        if (! $this->userRepository->hasAdministratorRole($guard->user())) {
            Flash::error(trans('cms.you_need_to_sign_in_first'));

            return redirect()->guest(route('cms.sessions.create'));
        }

        return $next($request);
    }
}
