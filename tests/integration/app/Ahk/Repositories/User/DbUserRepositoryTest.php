<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   6/2/2016
 */

namespace tests\integration\app\Ahk\Repositories\User;

use App\Ahk\Repositories\User\DbUserRepository;
use App\Ahk\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Auth;
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
	public function it_signs_in_company_representative_user()
	{
		$dbUserRepository = new DbUserRepository();

		$user = factory(User::class)->create(['password' => 'some-password']);

		# User has not a company representative role; system should deny access

		$dbUserRepository->assignCompanyRepresentativeRole($user);

		# User is not verified; system should deny signing in.
		$this->assertFalse(
			$dbUserRepository->attemptToSignIn(['email' => $user->email, 'password' => 'some-password']));

		$this->assertFalse(Auth::check($user));

		$user = factory(User::class)->create(['password' => 'some-password', 'verified' => true]);

		$dbUserRepository->assignCompanyRepresentativeRole($user);

		$dbUserRepository->attemptToSignIn(['email' => $user->email, 'password' => 'some-password']);

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
}