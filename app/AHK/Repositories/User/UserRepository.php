<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   25/11/2015
 */

namespace App\AHK\Repositories\User;


use App\AHK\Role;
use App\AHK\User;
use App\Http\Requests\StoreUserRequest;

interface UserRepository {

	/**
	 * Store a user on the storage
	 * @param StoreUserRequest $storeUserRequest
	 * @return User|false
	 */
	public function store(StoreUserRequest $storeUserRequest);

	/**
	 * Assign a role to the given user
	 * @param User $user
	 * @param Role $role
	 * @return
	 */
	public function assignRole(User $user, Role $role);
}