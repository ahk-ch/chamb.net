<?php

namespace App\Http\Middleware\Cms;

use App\Ahk\Repositories\User\UserRepository;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class RedirectIfAuthenticated.
 */
class RedirectIfAuthenticated
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
        if (Auth::guard($guard)->check() && $this->userRepository->hasAdministratorRole(Auth::user())) {
            return redirect(route('cms.dashboard'));
        }

        return $next($request);
    }
}
