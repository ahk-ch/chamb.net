<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   21/2/2016
 */
namespace App\Ahk\Repositories\File;

use App\Ahk\File;

/**
 * Interface FileRepository.
 */
interface FileRepository
{
    /**
     * @param $data
     *
     * @return mixed
     */
    public function store($data);

    /**
     * @param File $file
     * @param      $data
     *
     * @return File|false
     */
    public function update(File $file, $data);

}

