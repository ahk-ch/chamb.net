<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   19/2/2016
 */

namespace App\Ahk\Storage;

class CompaniesStorage
{
	public static function getAhkStorageDirectoryByCompanySlug($companySlug)
	{
		return env('APP_ENV') . DIRECTORY_SEPARATOR . "ahk" . DIRECTORY_SEPARATOR . "my" . DIRECTORY_SEPARATOR .
		"companies" . DIRECTORY_SEPARATOR . $companySlug . DIRECTORY_SEPARATOR;
	}

}