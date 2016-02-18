<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   25/11/2015
 */

namespace App\Ahk\Repositories\User;


use App\Ahk\Notifications\Flash;
use App\Ahk\Repositories\DbRepository;
use App\Ahk\Role;
use App\Ahk\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DbUserRepository extends DbRepository implements UserRepository
{

	/**
	 * Enable user account
	 * @param $token
	 * @return mixed
	 */
	public function confirmEmail($token)
	{
		$user = User::whereToken($token)->firstOrFail();

		$user->verified = true;

		$user->token = null;

		return $user->save() ? $user : false;;
	}

	/**
	 * @param array $data
	 * @param bool $rememberMe
	 * @param bool $login
	 * @return User|false
	 */
	public function attemptToSignIn(array $data, $rememberMe = false, $login = false)
	{
		if ( ! Auth::validate(array_only($data, ['email', 'password'])) )
		{
			Flash::error(trans('ahk_messages.credentials_mismatch'));

			return false;
		}

		$user = $this->findByEmail($data['email']);

		if ( ! $user->verified )
		{
			Flash::error(trans('ahk_messages.please_validate_your_email_first'));

			return false;
		}

		if ( ! $this->hasCompanyRepresentativeRole($user))
		{
			Flash::error(trans('ahk_messages.you_do_not_have_the_necessary_privileges'));

			return false;
		}

		Auth::login($user);

		return $user;
	}

	/**
	 * Find user by email
	 * @param $email
	 * @return User|null
	 */
	public function findByEmail($email)
	{
		return User::where('email', $email)->first();
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
			if ( $role->name === $roleName ) return true;
		}

		return false;
	}

	/**
	 * Store a user on the storage
	 * @param array $data
	 * @return User|false
	 */
	public function storeCompanyRepresentativeAccount(array $data)
	{
		$user = $this->store($data);

		return $this->assignCompanyRepresentativeRole($user);
	}

	/**
	 * Store a user on the storage
	 * @param array $data
	 * @return User|false
	 */
	public function store(array $data)
	{
		$user = new User(array_only($data, ['name', 'email', 'avatar_url']));

		$user->fill(['password' => Hash::make($data['password'])]);

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
}