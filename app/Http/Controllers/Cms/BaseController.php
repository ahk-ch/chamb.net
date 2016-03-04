<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;

class BaseController extends Controller
{

    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        !session('locale') ?: App::setLocale(session('locale'));

        $this->middleware('cms.auth');
    }
}

