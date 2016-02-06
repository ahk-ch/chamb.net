<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   6/2/2016
 */

namespace tests\integration\app\AHK\Repositories\User;

use App\AHK\Repositories\User\DbUserRepository;
use App\AHK\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
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
}