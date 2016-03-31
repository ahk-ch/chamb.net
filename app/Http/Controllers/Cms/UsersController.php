<?php

namespace App\Http\Controllers\Cms;

/**
 * Class UsersController.
 */
class UsersController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function subscribers()
    {
        return view('cms.users.subscribers.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function administrators()
    {
        return view('cms.users.administrators.index');
    }
}
