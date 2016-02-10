<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   17/12/2015
 */

namespace tests\integration\app\Ahk\Repositories\Company;

use App\Ahk\Company;
use App\Ahk\Industry;
use App\Ahk\Repositories\Company\DbCompanyRepository;
use App\Ahk\Repositories\Industry\DbIndustryRepository;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use tests\TestCase;

/**
 * Class DbCompanyRepositoryTest
 * @package tests\integration\app\Ahk\Repositories\Company
 */
class DbIndustryRepositoryTest extends TestCase
{
	use DatabaseMigrations;

	/**
	 * @var
	 */
	protected $dbIndustryRepository;

	/**
	 *
	 */
	public function setUp()
	{
		parent::setUp();

		$this->dbIndustryRepository = new DbIndustryRepository();
	}

	/** @test */
	public function it_returns_industries()
	{
		$this->assertSame(0, $this->dbIndustryRepository->all()->get()->count());

		$actualCompanies = factory(Industry::class, 2)->create();

		$expectedIndustries = $this->dbIndustryRepository->all()->get();

		$this->assertSame(2, $expectedIndustries->count());

		$this->assertSame(
			array_only($expectedIndustries->toArray(), $expectedIndustries[0]->getFillable()),
			array_only($actualCompanies->toArray(), $expectedIndustries[0]->getFillable())
		);
	}
}