<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{
	/**
	 * Render file specified by path
	 *
	 * @param Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function render(Request $request)
	{
		$path = $request->get('path');

		return Storage::get($path);
//		return response()->file($path);
	}

	/**
	 * Download file specified by path
	 *
	 * @param Request $request
	 * @return \Illuminate\Http\Response
	 */
	public function download(Request $request)
	{
		$path = $request->get('path');

		return response()->download(storage_path('app' . DIRECTORY_SEPARATOR . $path));
	}
}

