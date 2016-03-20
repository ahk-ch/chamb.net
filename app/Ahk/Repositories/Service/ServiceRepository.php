<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/2/2016
 */
namespace App\Ahk\Repositories\Service;

use Illuminate\Support\Collection;

/**
 * Interface ServiceRepository.
 */
interface ServiceRepository
{
    /**
     * Get all services
     *
     * @return Collection
     */
    public function all();
}

