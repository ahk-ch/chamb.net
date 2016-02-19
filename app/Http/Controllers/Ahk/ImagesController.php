<?php

namespace App\Http\Controllers\Ahk;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagesController extends Controller
{

	/**
	 * Get company image by its id
	 *
	 * @param Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function img(Request $request)
	{
		$imgName = $request->get('imgName');

		return Storage::get($imgName);
	}
}
