<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;

/**
 * Class BaseController.
 */
class BaseController extends Controller
{
    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        $this->middleware('cms.auth');
    }
}
