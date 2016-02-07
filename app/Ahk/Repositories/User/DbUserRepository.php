<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   25/11/2015
 */

namespace App\Ahk\Repositories\User;


use App\Ahk\Repositories\DbRepository;
use App\Ahk\Role;
use App\Ahk\User;
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
	 * @return User|false
	 */
	public function assignRole(User $user, Role $role)
	{
		$user->roles()->attach($role);

		return $user->save() ? $user : false;
	}

	/**
	 * Assign company representative role to the given user
	 * @param User $user
	 * @return User|bool
	 */
	public function assignCompanyRepresentativeRole(User $user)
	{
		$role = Role::where("name", Role::COMPANY_REPRESENTATIVE_ROLE)->firstOrFail();

		return $this->assignRole($user, $role);
	}

	/**
	 * Check whether the given user has role of company representative
	 * @param User $user
	 * @return bool
	 */
	public function hasCompanyRepresentativeRole(User $user)
	{
		return $this->hasRole($user, Role::COMPANY_REPRESENTATIVE_ROLE);
	}

	/**
	 * Check whether the given user has role of company representative
	 * @param User $user
	 * @param $roleName
	 * @return bool
	 */
	public function hasRole(User $user, $roleName)
	{
		foreach ($user->roles()->get() as $role)
		{
			if ( $role->name === $roleName) return true;
		}

		return false;
	}
}