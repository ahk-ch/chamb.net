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
		return $this->update(new File, $data);
	}

	/**
	 * @param File $file
	 * @param $data
	 * @return File|false
	 */
	public function update(File $file, $data)
	{
		if ( ! is_null($file->path) ) $currentFilePath = $file->path;

		$file->fill(array_merge($data,
			[File::PATH => FilesStorage::getFilesDirectory() . $data[ File::CLIENT_ORIGINAL_NAME ]]));

		$fileIsStored = Storage::put($file->path, file_get_contents($data[ File::TEMPORARY_PATH ]));

		if ( ! $fileIsStored || ! $file->save() ) return false;

		if ( isset($currentFilePath) ) Storage::delete($currentFilePath);

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