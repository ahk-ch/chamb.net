<?php

namespace App\Http\Controllers\Cms;

class DashboardController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        return view('cms.blank');
    }
}
