<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   6/2/2016
 */
namespace tests\integration\app\Ahk\Repositories\User;

use App\Ahk\Company;
use App\Ahk\Industry;
use App\Ahk\Repositories\Company\DbCompanyRepository;
use App\Ahk\Repositories\User\DbUserRepository;
use App\Ahk\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use tests\TestCase;

/**
 * Class DbUserRepositoryTest.
 */
class DbUserRepositoryTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_assigns_company_representative_role()
    {
        $dbUserRepository = new DbUserRepository();

        $user = factory(User::class)->create();

        $this->assertFalse($dbUserRepository->hasCompanyRepresentativeRole($user));

        $this->assertNotFalse($user = $dbUserRepository->assignCompanyRepresentativeRole($user));

        $this->assertTrue($dbUserRepository->hasCompanyRepresentativeRole($user));
    }

    /** @test */
    public function it_assigns_administrator_role()
    {
        $dbUserRepository = new DbUserRepository();

        $user = factory(User::class)->create();

        $this->assertFalse($dbUserRepository->hasAdministratorRole($user));

        $this->assertNotFalse($user = $dbUserRepository->assignAdministratorRole($user));

        $this->assertTrue($dbUserRepository->hasAdministratorRole($user));
    }

    /** @test */
    public function it_assigns_author_role()
    {
        $dbUserRepository = new DbUserRepository();

        $user = factory(User::class)->create();

        $this->assertFalse($dbUserRepository->hasAuthorRole($user));

        $this->assertNotFalse($user = $dbUserRepository->assignAuthorRole($user));

        $this->assertTrue($dbUserRepository->hasAuthorRole($user));
    }

    /** @test */
    public function it_stores_user()
    {
        $userRepository = new DbUserRepository();

        $expectedUserData = array_only(factory(User::class, 'with_primary_data')->make()->toArray(),
            ['name', 'email']);

        $this->dontSeeInDatabase('users', $expectedUserData);

        $this->assertNotFalse($user = $userRepository
            ->store(array_merge($expectedUserData, ['password' => 'pass'])));

        $this->seeInDatabase('users', $expectedUserData);

        $this->assertTrue(Hash::check('pass', $user->password));
    }

    /** @test */
    public function it_stores_company_representative_user()
    {
        $userRepository = new DbUserRepository();

        $user = factory(User::class)->make(['password' => 'pass']);

        $this->assertNotFalse($user = $userRepository->storeCompanyRepresentativeAccount([
            'email'    => $user->email,
            'name'     => $user->name,
            'password' => 'pass',
        ]));

        $this->seeInDatabase('users', [
            'email' => $user->email,
            'name'  => $user->name,
        ]);

        $this->assertTrue(Hash::check('pass', $user->password));

        $this->assertTrue($userRepository->hasCompanyRepresentativeRole($user));
    }

    /** @test */
    public function it_signs_in_company_representative_user()
    {
        $hashedPassword = Hash::make('some-password');

        $dbUserRepository = new DbUserRepository();
        $user = factory(User::class)->create(['password' => $hashedPassword]);

        // User has not a company representative role; system should deny access
        $this->assertFalse(
            $dbUserRepository->attemptToSignIn(['email' => $user->email, 'password' => 'some-password']));
        $this->assertFalse(Auth::check($user));

        // User is not verified; system should deny signing in.
        $dbUserRepository->assignCompanyRepresentativeRole($user);
        $this->assertFalse(
            $dbUserRepository->attemptToSignIn(['email' => $user->email, 'password' => 'some-password']));
        $this->assertFalse(Auth::check($user));

        // System should allow user to sign in
        $user = factory(User::class)->create(['password' => $hashedPassword, 'verified' => 1]);
        $dbUserRepository->assignCompanyRepresentativeRole($user);
        $this->assertNotFalse(
            $user = $dbUserRepository->attemptToSignIn(['email' => $user->email, 'password' => 'some-password']));
        $this->assertTrue(Auth::check($user));
    }

    /** @test */
    public function it_checks_company_representative_user_role()
    {
        $dbUserRepository = new DbUserRepository();

        $user = factory(User::class)->create();

        $this->assertFalse($dbUserRepository->hasCompanyRepresentativeRole($user));

        $dbUserRepository->assignCompanyRepresentativeRole($user);

        $this->assertTrue($dbUserRepository->hasCompanyRepresentativeRole($user));
    }

    /** @test */
    public function it_checks_administrator_role()
    {
        $dbUserRepository = new DbUserRepository();

        $user = factory(User::class)->create();

        $this->assertFalse($dbUserRepository->hasAdministratorRole($user));

        $dbUserRepository->assignAdministratorRole($user);

        $this->assertTrue($dbUserRepository->hasAdministratorRole($user));
    }

    /** @test */
    public function it_checks_author_user_role()
    {
        $dbUserRepository = new DbUserRepository();

        $user = factory(User::class)->create();

        $this->assertFalse($dbUserRepository->hasAuthorRole($user));

        $dbUserRepository->assignAuthorRole($user);

        $this->assertTrue($dbUserRepository->hasAuthorRole($user));
    }

    /** @test */
    public function it_returns_user_by_email()
    {
        $dbUserRepository = new DbUserRepository();

        $user = factory(User::class)->create();

        $keys = $user->getFillable();

        $this->assertEquals(
            array_only($user->toArray(), $keys),
            array_only($dbUserRepository->findByEmail($user->email)->toArray(), $keys));
    }

    /** @test */
    public function it_returns_company_representative_users()
    {
        $dbUserRepository = new DbUserRepository();

        factory(User::class, 2)->create(); // Use to validate it does not return these.
        $actualCompanyRepresentativeUsers = factory(User::class, 2)->create();
        $dbUserRepository->assignCompanyRepresentativeRole($actualCompanyRepresentativeUsers->get(0));
        $dbUserRepository->assignCompanyRepresentativeRole($actualCompanyRepresentativeUsers->get(1));

        $expectedUsers = $dbUserRepository->withCompanyRepresentativeRole()->get();
        $keys = $actualCompanyRepresentativeUsers->get(0)->getFillable();

        $this->assertSame(
            array_only($expectedUsers->toArray(), $keys),
            array_only($actualCompanyRepresentativeUsers->toArray(), $keys));
    }

    /** @test */
    public function it_returns_users_having_any_company_of_an_industry()
    {
        $dbUserRepository = new DbUserRepository();
        $dbCompanyRepository = new DbCompanyRepository();

        factory(User::class, 2)->create(); // Use to validate it does not return these.
        $expectedUsers = factory(User::class, 2)->create();
        $dbUserRepository->assignCompanyRepresentativeRole($expectedUsers->get(0));
        $dbUserRepository->assignCompanyRepresentativeRole($expectedUsers->get(1));

        $industry = factory(Industry::class)->create();
        factory(Company::class)->create();
        factory(Company::class)->create(['industry_id' => $industry->id, 'user_id' => $expectedUsers->get(0)->id]);

        $keys = $expectedUsers->get(0)->getFillable();
        $actualUsers = $dbUserRepository->whereCompaniesIndustry($industry)->get();

        $this->assertTrue($dbUserRepository->hasCompanyRepresentativeRole($actualUsers->get(0)));

        $this->assertCount(1, $actualUsers);

        $this->assertSame(
            array_only($expectedUsers->toArray(), $keys),
            array_only($actualUsers->toArray(), $keys));

        $company = factory(Company::class)->create(['industry_id' => $industry->id]);
        $dbCompanyRepository->assignRepresentativeUser($company, $expectedUsers->get(0));

        $actualUsers = $dbUserRepository->whereCompaniesIndustry($industry)->get();

        $this->assertCount(2, $actualUsers);
    }

    /** @test */
    public function it_returns_author_users()
    {
        $dbUserRepository = new DbUserRepository();
        factory(User::class, 2)->create(); // Use to validate it does not return these.
        $actualAuthorUsers = factory(User::class, 2)->create();
        $dbUserRepository->assignAuthorRole($actualAuthorUsers->get(0));
        $dbUserRepository->assignAuthorRole($actualAuthorUsers->get(1));

        $expectedUsers = $dbUserRepository->getWithAuthorRole();
        $keys = $actualAuthorUsers->get(0)->getFillable();

        $this->assertSame(
            array_only($expectedUsers->toArray(), $keys),
            array_only($actualAuthorUsers->toArray(), $keys));
    }

    /** @test */
    public function it_verifies_company_is_owned_by_user()
    {
        $dbUserRepository = new DbUserRepository();
        $user = factory(User::class)->create();
        $company = factory(Company::class)->create(['user_id' => $user->id]);
        $companyValidator = factory(Company::class)->create();

        $this->assertFalse($dbUserRepository->hasCompany($user, $companyValidator));

        $this->assertTrue($dbUserRepository->hasCompany($user, $company));
    }

    /** @test */
    public function it_generates_recovery_token()
    {
        $dbUserRepository = new DbUserRepository();
        $user = factory(User::class)->create();
        $oldToken = $user->recovery_token;

        $user = $dbUserRepository->generateRecoveryToken($user);

        $this->assertNotEquals($user->token, $oldToken);

        $this->assertNotNull($user->token);
    }

    /** @test */
    public function it_finds_user_by_slug_and_recovery_token()
    {
        $dbUserRepository = new DbUserRepository();
        $user = factory(User::class)->create();
        $keys = $user->getFillable();
        $expectedData = array_only($user->toArray(), $keys);

        $this->assertNotNull(
            $actualUser = $dbUserRepository->findBySlugAndRecoveryToken($user->slug, $user->recovery_token));

        $actualData = array_only($actualUser->toArray(), $keys);

        $this->assertEquals($expectedData, $actualData);
    }

    /** @test */
    public function it_updates_password()
    {
        $dbUserRepository = new DbUserRepository();
        $oldPassword = 'old-password';
        $newPassword = 'new-password';
        $user = factory(User::class)->create(['password' => Hash::make($oldPassword)]);

        $user = $dbUserRepository->updatePassword($user, $newPassword);

        $this->assertNotTrue(Hash::check($oldPassword, $user->password));

        $this->assertTrue(Hash::check($newPassword, $user->password));
    }
}
