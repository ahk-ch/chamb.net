<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @version 7/24/2015
 */
namespace App\Http\Controllers\Ahk;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ahk\SetLanguageRequest;

/**
 * Class SettingsController.
 */
class SettingsController extends Controller
{
    /**
     * Change the language of the app.
     *
     * @param SetLanguageRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function setLocale(SetLanguageRequest $request)
    {
        session(['locale' => $request->get('lang')]);

        return redirect()->back();
    }
}

