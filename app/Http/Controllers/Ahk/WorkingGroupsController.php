<?php

namespace App\Http\Controllers\Ahk;

use App\Http\Controllers\Controller;

/**
 * Class WorkingGroupsController.
 */
class WorkingGroupsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('ahk.health.work-groups');
    }
}
