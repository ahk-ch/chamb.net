<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   21/2/2016
 */

namespace App\Ahk\Repositories\File;

use App\Ahk\File;
use App\Ahk\Repositories\DbRepository;
use App\Ahk\Storage\FilesStorage;
use Illuminate\Support\Facades\Storage;

class DbFileRepository extends DbRepository implements FileRepository
{
	/**
	 * @param $data
	 * @return mixed
	 */
	public function store($data)
	{
		$file = new File(array_only($data, [File::NAME, File::DESCRIPTION]));

		$file->fill([File::PATH => FilesStorage::getFilesDirectory() . $data[ File::NAME ]]);

		$fileIsStored = Storage::put($file->path, file_get_contents($data[ File::TEMPORARY_PATH ]));

		if ( ! $fileIsStored || ! $file->save() ) return false;

		return $file;
	}

//	/**
//	 * Update company logo
//	 *
//	 * @param Company $company
//	 * @param $clientOriginalName
//	 * @param $realPath
//	 * @param null $storageLocation
//	 * @return Company|false
//	 */
//	public function updateLogo(Company $company, $clientOriginalName, $realPath, $storageLocation = null)
//	{
//		$storageLocation = $storageLocation === null ? FilesStorage::getFilesDirectory() : $storageLocation;
//
//		$logoLocation = $storageLocation . $clientOriginalName;
//
//		if ( ! File::exists($storageLocation) ) Storage::makeDirectory($storageLocation);
//
//		if ( Storage::exists($logoLocation) ) Storage::delete($logoLocation);
//
//		Storage::put($logoLocation, file_get_contents($realPath));
//
//		$company->logo = $logoLocation;
//
//		if ( ! $company->save() )
//		{
//			Flash::error(trans('ahk_messages.unable_to_update_logo'));
//
//			return false;
//		}
//
//		return $company;
//	}
}