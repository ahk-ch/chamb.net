<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since  01/04/16
 */
namespace App\Http\Controllers\Ahk;

use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        $this->middleware('ahk.auth');
    }
}
