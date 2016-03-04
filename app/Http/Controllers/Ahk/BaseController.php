<?php

namespace App\Http\Controllers\Ahk;

use App\Http\Controllers\Controller;


class BaseController extends Controller
{
    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        !session('locale') ?: App::setLocale(session('locale'));
    }
}

