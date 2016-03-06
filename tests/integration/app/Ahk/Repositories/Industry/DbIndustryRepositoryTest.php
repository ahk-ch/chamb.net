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
use App\Ahk\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use tests\TestCase;

/**
 * Class DbCompanyRepositoryTest
 * @package tests\integration\app\Ahk\Repositories\Company
 */
class DbIndustryRepositoryTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function it_returns_all_industries()
	{
		$dbIndustryRepository = new DbIndustryRepository();

		$initTotalIndustries =$dbIndustryRepository->all()->count();

		$actualCompanies = factory(Industry::class, 2)->create();

		$expectedIndustries = $dbIndustryRepository->all();

		$this->assertSame($initTotalIndustries + 2, $expectedIndustries->count());

		$this->assertSame(
			array_only($expectedIndustries->toArray(), $expectedIndustries[0]->getFillable()),
			array_only($actualCompanies->toArray(), $expectedIndustries[0]->getFillable())
		);
	}

	/** @test */
	public function it_stores_an_industry()
	{
		$dbIndustryRepository = new DbIndustryRepository();
		$expectedIndustry = factory(Industry::class)->make();
		$author = factory(User::class)->create();
		$keys = $expectedIndustry->getFillable();
		$expectedData = array_only($expectedIndustry->toArray(), $keys);

		$this->notSeeInDatabase('industries', $expectedData);

		$actualIndustry = $dbIndustryRepository->store($author, $expectedData);

		$this->seeInDatabase('industries', $expectedData);

		$this->assertSame($author->id, $actualIndustry->author->id);
	}

	/** @test */
	public function it_updates_industry_by_id()
	{
		$dbIndustryRepository = new DbIndustryRepository();
		$expectedIndustry = factory(Industry::class)->make();
		$currentIndustry = factory(Industry::class)->create();
		$keys = $expectedIndustry->getFillable();
		$expectedData = array_only($expectedIndustry->toArray(), $keys);
		$currentData = array_only($currentIndustry->toArray(), $keys);

		$this->seeInDatabase('industries', $currentData);
		$this->notSeeInDatabase('industries', $expectedData);

		$dbIndustryRepository->updateById($currentIndustry->id, $expectedData);

		$this->notSeeInDatabase('industries', $currentData);
		$this->seeInDatabase('industries', $expectedData);
	}

	/** @test */
	public function it_returns_industry_by_id()
	{
		$dbIndustryRepository = new DbIndustryRepository();
		$currentIndustry = factory(Industry::class)->create();
		$keys = $currentIndustry->getFillable();
		$expectedData = array_only($currentIndustry->toArray(), $keys);
		$actualData = array_only($dbIndustryRepository->getById($currentIndustry->id)->toArray(), $keys);

		$this->assertEquals($expectedData, $actualData);
	}
}