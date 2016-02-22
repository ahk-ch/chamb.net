<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   21/2/2016
 */

namespace App\Ahk\Repositories\File;

/**
 * Interface FileRepository
 * @package App\Ahk\Repositories\File
 */
interface FileRepository
{
	/**
	 * @param $data
	 * @return mixed
	 */
	public function store($data);
}