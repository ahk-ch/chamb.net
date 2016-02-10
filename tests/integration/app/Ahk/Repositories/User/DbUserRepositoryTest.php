<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   6/2/2016
 */

namespace tests\integration\app\Ahk\Repositories\User;

use App\Ahk\Repositories\User\DbUserRepository;
use App\Ahk\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
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
}