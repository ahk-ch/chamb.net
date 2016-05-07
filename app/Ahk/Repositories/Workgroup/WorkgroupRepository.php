<?php

/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 5/7/16
 */
namespace App\Ahk\Repositories\Workgroup;

use App\Ahk\User;
use App\Ahk\Workgroup;

interface WorkgroupRepository
{
    /**
     * Store a workgroup.
     *
     * @param $data
     * @return Workgroup|false
     */
    public function storeAndAssignCreatorByUser($data, User $user);
}