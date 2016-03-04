<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{

    /**
     * Get file specified by path
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function render(Request $request)
    {
        $path = $request->get('path');

        return Storage::get($path);
    }
}

