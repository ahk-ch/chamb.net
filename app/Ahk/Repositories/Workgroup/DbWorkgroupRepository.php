<?php

/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 5/7/16
 */
namespace App\Ahk\Repositories\Workgroup;

use App\Ahk\Repositories\DbRepository;
use App\Ahk\User;
use App\Ahk\Workgroup;

class DbWorkgroupRepository extends DbRepository implements WorkgroupRepository
{
    /**
     * DbWorkgroupRepository constructor.
     */
    public function __construct()
    {
        parent::__construct(new Workgroup());
    }

    /**
     * Store a workgroup.
     *
     * @param $data
     * @param User $user
     * @return Workgroup|false
     */
    public function storeAndAssignCreatorByUser($data, User $user)
    {
        $workgroup = new Workgroup(array_only($data, $this->getModel()->getFillable()));

        $workgroup->creator()->associate($user);

        return $workgroup->save() ? $workgroup : false;
    }

    /**
     * Find a workgroup by its name.
     *
     * @param $name
     * @return Workgroup|null
     */
    public function findByName($name)
    {
        return Workgroup::where('name', $name)->first();
    }
}
