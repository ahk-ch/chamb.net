<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   19/2/2016
 */

namespace App\Ahk\Storage;

class CompaniesStorage
{
	public static function getAhkStorageDirectoryByCompanyId($companyId)
	{
		return "ahk" . DIRECTORY_SEPARATOR . "my" . DIRECTORY_SEPARATOR .
		"companies" . DIRECTORY_SEPARATOR . $companyId . DIRECTORY_SEPARATOR;
	}

}