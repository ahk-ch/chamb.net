<?php

namespace App\Http;

use App\Http\Middleware\Ahk\AuthenticateAhk;
use App\Http\Middleware\Ahk\RedirectIfAuthenticatedAhk;
use App\Http\Middleware\Cms\AuthenticateCms as AuthenticateCms;
use App\Http\Middleware\Cms\RedirectIfAuthenticatedCms as RedirectIfAuthenticatedCms;
use Illuminate\Auth\Middleware\AuthenticateWithBasicAuth;
use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \App\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \App\Http\Middleware\VerifyCsrfToken::class,
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth.basic' => AuthenticateWithBasicAuth::class,

        'ahk.guest' => RedirectIfAuthenticatedAhk::class,
        'ahk.auth'  => AuthenticateAhk::class,

        'cms.auth'  => AuthenticateCms::class,
        'cms.guest' => RedirectIfAuthenticatedCms::class,
    ];
}
