<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   17/12/2015
 */

namespace tests\integration\app\AHK\Repositories\Company;

use App\AHK\Company;
use App\AHK\Repositories\Company\DbCompanyRepository;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use tests\TestCase;

/**
 * Class DbCompanyRepositoryTest
 * @package tests\integration\app\AHK\Repositories\Company
 */
class DbCompanyRepositoryTest extends TestCase
{
	use DatabaseMigrations;

	/**
	 * @var
	 */
	protected $dbCompanyRepository;

	/**
	 *
	 */
	public function setUp()
	{
		parent::setUp();

		$this->dbCompanyRepository = new DbCompanyRepository();
	}

	/** @test */
	public function it_returns_companies()
	{
		$this->assertSame(0, $this->dbCompanyRepository->paginate()->count());

		$actualCompanies = factory(Company::class, 2)->create();

		$expectedCompanies = $this->dbCompanyRepository->paginate(2);

		$this->assertSame(2, $expectedCompanies->count());

		$this->assertSame(
			array_only($expectedCompanies->toArray(), $expectedCompanies[0]->getFillable()),
			array_only($actualCompanies->toArray(), $expectedCompanies[0]->getFillable())
		);
	}
}