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

/**
 * Class DbFileRepository.
 */
class DbFileRepository extends DbRepository implements FileRepository
{
    /**
     * DbFileRepository constructor.
     *
     * @param File $model
     */
    public function __construct(File $model = null)
    {
        $model = $model === null ? new File : $model;

        parent::__construct($model);
    }

    /**
     * @param $data
     *
     * @return mixed
     */
    public function store($data)
    {
        return $this->update(new File, $data);
    }

    /**
     * @param File $file
     * @param      $data
     *
     * @return File|false
     */
    public function update(File $file, $data)
    {
        if (! is_null($file->path)) {
            $currentFilePath = $file->path;
        }

        $file->fill(array_merge($data,
            [File::PATH => FilesStorage::getFilesDirectory().$data[File::CLIENT_ORIGINAL_NAME]]));

        $fileIsStored = Storage::put($file->path, file_get_contents($data[File::TEMPORARY_PATH]));

        if (! $fileIsStored || ! $file->save()) {
            return false;
        }

        if (isset($currentFilePath)) {
            Storage::delete($currentFilePath);
        }

        return $file;
    }
}
