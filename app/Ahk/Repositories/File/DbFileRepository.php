<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   21/2/2016
 */

namespace App\Ahk\Repositories\File;

use App\Ahk\File;
use App\Ahk\Repositories\DbRepository;
use Illuminate\Support\Facades\Storage;

class DbFileRepository extends DbRepository implements FileRepository
{

	/**
	 * @param $data
	 * @return mixed
	 */
	public function store($data)
	{
		$file = new File(array_only($data, ['name', 'description', 'path', 'slug']));

		Storage::put($file->path, file_get_contents($data['file_temp_path']));

		return $file->save() ? $file : false;
	}
}