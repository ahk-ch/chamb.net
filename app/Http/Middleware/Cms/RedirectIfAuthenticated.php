<?php

namespace App\Http\Middleware\Cms;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
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
		if ( Auth::guard($guard)->check() ) return redirect(route('cms.dashboard'));

		return $next($request);
	}
}
