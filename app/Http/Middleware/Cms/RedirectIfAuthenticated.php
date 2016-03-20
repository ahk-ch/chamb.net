<?php

namespace App\Http\Middleware\Cms;

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
        if (Auth::guard($guard)->check()) return redirect(route('cms.dashboard'));

        return $next($request);
    }
}

