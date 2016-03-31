<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/2/2016
 */
namespace App\Ahk\Repositories\Service;

use App\Ahk\Repositories\DbRepository;
use App\Ahk\Service;
use Illuminate\Support\Collection;

/**
 * Class DbServiceRepository.
 */
class DbServiceRepository extends DbRepository implements ServiceRepository
{
    /**
     * DbServiceRepository constructor.
     *
     * @param Service $model
     */
    public function __construct(Service $model = null)
    {
        $model = $model === null ? new Service : $model;

        parent::__construct($model);
    }

    /**
     * Get all services.
     *
     * @return Collection
     */
    public function all()
    {
        return Service::all();
    }
}
