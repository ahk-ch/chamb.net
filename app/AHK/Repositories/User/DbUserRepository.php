<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   25/11/2015
 */

namespace App\AHK\Repositories\User;


use App\AHK\Repositories\DbRepository;
use App\AHK\Role;
use App\AHK\User;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Hash;

class DbUserRepository extends DbRepository implements UserRepository {

	/**
	 * Store a user on the storage
	 * @param StoreUserRequest $request
	 * @return User|false
	 */
	public function store(StoreUserRequest $request)
	{
		$user = new User($request->only('username', 'password', 'email'));

		$user->password = Hash::make($request->get('password'));

		return $user->save() ? $user : false;
	}

	/**
	 * Assign a role to the given user
	 * @param User $user
	 * @param Role $role
	 */
	public function assignRole(User $user, Role $role)
	{
		$user->roles()->attach($role);

		return $user->save() ? 
	}
}