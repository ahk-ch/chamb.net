<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   6/2/2016
 */

namespace tests\integration\app\Ahk\Repositories\User;

use App\Ahk\Company;
use App\Ahk\Repositories\User\DbUserRepository;
use App\Ahk\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use tests\TestCase;

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
	public function it_stores_user()
	{
		$userRepository = new DbUserRepository();

		$user = factory(User::class)->make(['password' => 'pass']);

		$this->dontSeeInDatabase('users', [
			'email'      => $user->email,
			'name'       => $user->name,
			'avatar_url' => $user->avatar_url,
			'password'   => $user->password,
		]);

		$this->assertNotFalse($user = $userRepository->store([
			'email'      => $user->email,
			'name'       => $user->name,
			'avatar_url' => $user->avatar_url,
			'password'   => 'pass',
		]));

		$this->seeInDatabase('users', [
			'email'      => $user->email,
			'name'       => $user->name,
			'avatar_url' => $user->avatar_url,
			'password'   => $user->password,
		]);
	}

	/** @test */
	public function it_stores_company_representative_user()
	{
		$userRepository = new DbUserRepository();

		$user = factory(User::class)->make(['password' => 'pass']);

		$this->assertNotFalse($user = $userRepository->storeCompanyRepresentativeAccount([
			'email'      => $user->email,
			'name'       => $user->name,
			'avatar_url' => $user->avatar_url,
			'password'   => 'pass',
		]));

		$this->seeInDatabase('users', [
			'email'      => $user->email,
			'name'       => $user->name,
			'avatar_url' => $user->avatar_url,
			'password'   => $user->password,
		]);

		$this->assertTrue($userRepository->hasCompanyRepresentativeRole($user));
	}

	/** @test */
	public function it_signs_in_company_representative_user()
	{
		$hashedPassword = Hash::make('some-password');

		$dbUserRepository = new DbUserRepository();
		$user = factory(User::class)->create(['password' => $hashedPassword]);

		# User has not a company representative role; system should deny access
		$this->assertFalse(
			$dbUserRepository->attemptToSignIn(['email' => $user->email, 'password' => 'some-password']));
		$this->assertFalse(Auth::check($user));

		# User is not verified; system should deny signing in.
		$dbUserRepository->assignCompanyRepresentativeRole($user);
		$this->assertFalse(
			$dbUserRepository->attemptToSignIn(['email' => $user->email, 'password' => 'some-password']));
		$this->assertFalse(Auth::check($user));

		# System should allow user to sign in
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
	public function it_returns_user_by_email()
	{
		$dbUserRepository = new DbUserRepository();

		$user = factory(User::class)->create();

		$this->assertSame(
			array_only($user->toArray(), $user->getFillable()),
			array_only($dbUserRepository->findByEmail($user->email)->toArray(), $user->getFillable()));
	}

	/** @test */
	public function it_returns_company_representative_users()
	{
		$dbUserRepository = new DbUserRepository();

		factory(User::class, 2)->create(); # Use to validate it does not return these.
		$actualCompanyRepresentativeUsers = factory(User::class, 2)->create();
		$dbUserRepository->assignCompanyRepresentativeRole($actualCompanyRepresentativeUsers->get(0));
		$dbUserRepository->assignCompanyRepresentativeRole($actualCompanyRepresentativeUsers->get(1));

		$expectedUsers = $dbUserRepository->getWithCompanyRepresentativeRole();
		$keys = $actualCompanyRepresentativeUsers->get(0)->getFillable();

		$this->assertSame(
			array_only($expectedUsers->toArray(), $keys),
			array_only($actualCompanyRepresentativeUsers->toArray(), $keys));
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
}