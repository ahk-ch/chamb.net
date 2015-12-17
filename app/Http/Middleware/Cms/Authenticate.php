<?php

namespace App\Http\Middleware\Cms;

use App\AHK\Notifications\Flash;
use Closure;
use Illuminate\Auth\Guard;

class Authenticate
{
	/**
	 * The Guard implementation.
	 *
	 * @var Guard
	 */
	protected $auth;

	/**
	 * Create a new filter instance.
	 *
	 * @param  Guard $auth
	 * @return void
	 */
	public function __construct(Guard $auth)
	{
		$this->auth = $auth;
	}

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Closure $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if ( $this->auth->guest() )
		{
			if ( $request->ajax() )
			{
				return response('Unauthorized.', 401);
			} else
			{
				Flash::error(trans('cms.you_need_to_login_first'));

				return redirect()->guest(route('cms.sessions.create'));
			}
		}

		return $next($request);
	}
}
