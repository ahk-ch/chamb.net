<?php

namespace App\Http\Middleware;

use App\AHK\Notifications\Flash;
use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
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
		if ( Auth::guard($guard)->guest() )
		{
			if ( $request->ajax() )
			{
				return response('Unauthorized.', 401);
			} else
			{
				Flash::error(trans('ahk_messages.you_need_to_login'));

				return redirect()->guest(route('home_path'));
			}
		}

		return $next($request);
	}
}
