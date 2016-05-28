<?php

/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 5/7/16
 */
namespace App\Ahk\Repositories\Workgroup;

use App\Ahk\User;
use App\Ahk\Workgroup;
use Illuminate\Database\Eloquent\Collection;

interface WorkgroupRepository
{
    /**
     * Store a workgroup.
     *
     * @param $data
     * @param User $user
     * @return Workgroup|false
     */
    public function storeAndAssignCreatorByUser($data, User $user);

    /**
     * Find a workgroup by its name.
     *
     * @param $name
     * @return Workgroup|null
     */
    public function findByName($name);

    /**
     * Initialize a query will all workgroups.
     *
     * @return Collection
     */
    public function all();
}
