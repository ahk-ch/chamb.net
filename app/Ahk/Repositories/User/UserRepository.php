<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   25/11/2015
 */
namespace App\Ahk\Repositories\User;

use App\Ahk\Company;
use App\Ahk\Industry;
use App\Ahk\Role;
use App\Ahk\User;
use Illuminate\Database\Eloquent\Builder;

/**
 * Interface UserRepository.
 */
interface UserRepository
{
    /**
     * Store a user on the storage.
     *
     * @param array $data
     *
     * @return User|false
     */
    public function store(array $data);

    /**
     * Store a user on the storage.
     *
     * @param array $data
     *
     * @return User|false
     */
    public function storeCompanyRepresentativeAccount(array $data);

    /**
     * Assign company representative role to the given user.
     *
     * @param User $user
     *
     * @return User|bool
     */
    public function assignCompanyRepresentativeRole(User $user);

    /**
     * Assign administrator role to the given user.
     *
     * @param User $user
     *
     * @return User|bool
     */
    public function assignAdministratorRole(User $user);

    /**
     * Assign author role to the given user.
     *
     * @param User $user
     *
     * @return User|bool
     */
    public function assignAuthorRole(User $user);

    /**
     * Assign a role to the given user.
     *
     * @param User $user
     * @param Role $role
     *
     * @return
     */
    public function assignRole(User $user, Role $role);

    /**
     * Check whether the given user has role of company representative.
     *
     * @param User $user
     *
     * @return bool
     */
    public function hasCompanyRepresentativeRole(User $user);

    /**
     * Check whether the given user has role of administrator.
     *
     * @param User $user
     *
     * @return bool
     */
    public function hasAdministratorRole(User $user);

    /**
     * Check whether the given user has role of author.
     *
     * @param User $user
     *
     * @return bool
     */
    public function hasAuthorRole(User $user);

    /**
     * Check whether the given user has role of company representative.
     *
     * @param User $user
     * @param      $roleName
     *
     * @return User|false
     */
    public function hasRole(User $user, $roleName);

    /**
     * Enable user account.
     *
     * @param $token
     *
     * @return User|false
     */
    public function confirmEmail($token);

    /**
     * Sign User.
     *
     * @param array $data
     * @param bool  $rememberMe
     * @param bool  $login
     *
     * @return User|false
     */
    public function attemptToSignIn(array $data, $rememberMe = false, $login = false);

    /**
     * Find user by email.
     *
     * @param $email
     *
     * @return User|null
     */
    public function findByEmail($email);

    /**
     * Get all users that have role of company representative.
     *
     * @return Builder
     */
    public function withCompanyRepresentativeRole();

    /**
     * Get all users that have role of author.
     *
     * @return mixed
     */
    public function getWithAuthorRole();

    /**
     * Verify a company is owned by a user.
     *
     * @param User    $user
     * @param Company $company
     *
     * @return mixed
     */
    public function hasCompany(User $user, Company $company);

    /**
     * Verify a company is owned by a user.
     *
     * @param User $user
     *
     * @return User
     */
    public function generateRecoveryToken(User $user);

    /**
     * Find user by slug and recovery token.
     *
     * @param $slug
     * @param $recoveryToken
     *
     * @return User
     */
    public function findBySlugAndRecoveryToken($slug, $recoveryToken);

    /**
     * Update password of a user.
     *
     * @param User $user
     * @param      $password
     *
     * @return User|false
     */
    public function updatePassword(User $user, $password);

    /**
     * Get all users with role of company representative, which company/companies belong to the given industry.
     *
     * @param Industry $industry
     *
     * @return Builder
     */
    public function whereCompaniesIndustry(Industry $industry);
}

