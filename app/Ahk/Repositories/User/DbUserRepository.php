<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   25/11/2015
 */
namespace App\Ahk\Repositories\User;

use App\Ahk\Company;
use App\Ahk\Industry;
use App\Ahk\Notifications\Flash;
use App\Ahk\Repositories\DbRepository;
use App\Ahk\Role;
use App\Ahk\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * Class DbUserRepository.
 */
class DbUserRepository extends DbRepository implements UserRepository
{
    /**
     * DbUserRepository constructor.
     *
     * @param User $model
     */
    public function __construct(User $model = null)
    {
        $model = $model === null ? new User : $model;

        parent::__construct($model);
    }

    /**
     * Enable user account.
     *
     * @param $token
     *
     * @return mixed
     */
    public function confirmEmail($token)
    {
        $user = User::whereToken($token)->firstOrFail();

        $user->verified = true;

        $user->token = null;

        return $user->save() ? $user : false;
    }

    /**
     * @param array $data
     * @param bool $rememberMe
     * @param bool $login
     *
     * @return User|false
     */
    public function attemptToSignIn(array $data, $rememberMe = false, $login = false)
    {
        if (!Auth::validate(array_only($data, ['email', 'password']))) {
            Flash::error(trans('ahk_messages.credentials_mismatch'));

            return false;
        }

        $user = $this->findByEmail($data['email']);

        if (!$user->verified) {
            Flash::error(trans('ahk_messages.please_validate_your_email_first'));

            return false;
        }

        Auth::login($user);

        return $user;
    }

    /**
     * Find user by email.
     *
     * @param $email
     *
     * @return User|null
     */
    public function findByEmail($email)
    {
        return User::where('email', $email)->first();
    }

    /**
     * Check whether the given user has role of company representative.
     *
     * @param User $user
     *
     * @return bool
     */
    public function hasCompanyRepresentativeRole(User $user)
    {
        return $this->hasRole($user, Role::COMPANY_REPRESENTATIVE_ROLE);
    }

    /**
     * Check whether the given user has role of company representative.
     *
     * @param User $user
     * @param      $roleName
     *
     * @return bool
     */
    public function hasRole(User $user, $roleName)
    {
        foreach ($user->roles()->get() as $role) {
            if ($role->name === $roleName) {
                return true;
            }
        }

        return false;
    }

    /**
     * Store a user on the storage.
     *
     * @param array $data
     *
     * @return User|false
     */
    public function storeCompanyRepresentativeAccount(array $data)
    {
        $user = $this->store($data);

        return $this->assignCompanyRepresentativeRole($user);
    }

    /**
     * Store a user on the storage.
     *
     * @param array $data
     *
     * @return User|false
     */
    public function store(array $data)
    {
        $user = new User(array_only($data, ['name', 'email', 'avatar_url']));

        $user->password = Hash::make($data['password']);

        return $user->save() ? $user : false;
    }

    /**
     * Assign company representative role to the given user.
     *
     * @param User $user
     *
     * @return User|bool
     */
    public function assignCompanyRepresentativeRole(User $user)
    {
        $role = Role::where('name', Role::COMPANY_REPRESENTATIVE_ROLE)->firstOrFail();

        return $this->assignRole($user, $role);
    }

    /**
     * Assign a role to the given user.
     *
     * @param User $user
     * @param Role $role
     *
     * @return User|false
     */
    public function assignRole(User $user, Role $role)
    {
        $user->roles()->attach($role);

        return $user->save() ? $user : false;
    }

    /**
     * Verify a company is owned by a user.
     *
     * @param User $user
     * @param Company $company
     *
     * @return mixed
     */
    public function hasCompany(User $user, Company $company)
    {
        return !$user->companies()->where('id', $company->id)->get()->isEmpty();
    }

    /**
     * Verify a company is owned by a user.
     *
     * @param User $user
     *
     * @return User
     */
    public function generateRecoveryToken(User $user)
    {
        return $user->fill(['recovery_token' => str_random(32)])->save() ? $user : false;
    }

    /**
     * Find user by slug and recovery token.
     *
     * @param $slug
     * @param $recoveryToken
     *
     * @return User
     */
    public function findBySlugAndRecoveryToken($slug, $recoveryToken)
    {
        return User::where(User::SLUG, $slug)->where(User::RECOVERY_TOKEN, $recoveryToken)->first();
    }

    /**
     * Update password of a user.
     *
     * @param User $user
     * @param      $password
     *
     * @return User|false
     */
    public function updatePassword(User $user, $password)
    {
        return $user->fill(['password' => Hash::make($password)])->save() ? $user : false;
    }

    /**
     * Check whether the given user has role of author.
     *
     * @param User $user
     *
     * @return bool
     */
    public function hasAuthorRole(User $user)
    {
        return $this->hasRole($user, Role::AUTHOR_ROLE);
    }

    /**
     * Assign author role to the given user.
     *
     * @param User $user
     *
     * @return User|bool
     */
    public function assignAuthorRole(User $user)
    {
        $role = Role::where('name', Role::AUTHOR_ROLE)->firstOrFail();

        return $this->assignRole($user, $role);
    }

    /**
     * Get all users that have role of author.
     *
     * @return mixed
     */
    public function getWithAuthorRole()
    {
        return User::whereHas('roles', function (Builder $query) {
            $query->where('roles.name', Role::AUTHOR_ROLE);
        })->get();
    }

    /**
     * Get all users with role of company representative, which company/companies belong to the given industry.
     *
     * @param Industry $industry
     *
     * @return Builder
     */
    public function whereCompaniesIndustry(Industry $industry)
    {
        return User::whereHas('companies.industry', function (Builder $query) use ($industry) {
            $query->where('industries.id', $industry->id);
        });
    }

    /**
     * Get all users that have role of company representative.
     *
     * @return Builder
     */
    public function withCompanyRepresentativeRole()
    {
        return $this->getModel()->whereHas('roles', function (Builder $query) {
            $query->where('roles.name', Role::COMPANY_REPRESENTATIVE_ROLE);
        });
    }

    /**
     * Assign administrator role to the given user.
     *
     * @param User $user
     *
     * @return User|bool
     */
    public function assignAdministratorRole(User $user)
    {
        $role = Role::where('name', Role::ADMINISTRATOR_ROLE)->firstOrFail();

        return $this->assignRole($user, $role);
    }

    /**
     * Check whether the given user has role of administrator.
     *
     * @param User $user
     *
     * @return bool
     */
    public function hasAdministratorRole(User $user)
    {
        return $this->hasRole($user, Role::ADMINISTRATOR_ROLE);
    }
}
