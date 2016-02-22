<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   19/2/2016
 */

namespace App\Ahk\Storage;

/**
 * Class FilesStorage
 * @package App\Ahk\Storage
 */
class FilesStorage
{
	/**
	 * @return string
	 */
	public static function getFilesDirectory()
	{
		return env('APP_ENV') . DIRECTORY_SEPARATOR . "img" . DIRECTORY_SEPARATOR;
	}

}