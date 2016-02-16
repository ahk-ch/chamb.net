<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   17/12/2015
 */

namespace tests\integration\app\Ahk\Repositories\Company;

use App\Ahk\Company;
use App\Ahk\Repositories\Company\DbCompanyRepository;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use tests\TestCase;

/**
 * Class DbCompanyRepositoryTest
 * @package tests\integration\app\Ahk\Repositories\Company
 */
class DbCompanyRepositoryTest extends TestCase
{
	use DatabaseMigrations;

	/**
	 * @var
	 */
	protected $dbCompanyRepository;

	/** @test */
	public function it_returns_companies()
	{
		$dbCompanyRepository = new DbCompanyRepository();

		$this->assertSame(0, $dbCompanyRepository->paginate()->count());

		$actualCompanies = factory(Company::class, 2)->create();

		$expectedCompanies = $dbCompanyRepository->paginate(2);

		$this->assertSame(2, $expectedCompanies->count());

		$this->assertSame(
			array_only($expectedCompanies->toArray(), $expectedCompanies[0]->getFillable()),
			array_only($actualCompanies->toArray(), $expectedCompanies[0]->getFillable())
		);
	}
}