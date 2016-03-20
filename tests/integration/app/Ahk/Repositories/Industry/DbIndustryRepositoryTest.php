<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   17/12/2015
 */
namespace tests\integration\app\Ahk\Repositories\Company;

use App\Ahk\Company;
use App\Ahk\Event;
use App\Ahk\Industry;
use App\Ahk\Repositories\Company\DbCompanyRepository;
use App\Ahk\Repositories\Industry\DbIndustryRepository;
use App\Ahk\User;
use App\Ahk\Workgroup;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use tests\TestCase;

/**
 * Class DbIndustryRepositoryTest.
 */
class DbIndustryRepositoryTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_returns_all_industries()
    {
        $dbIndustryRepository = new DbIndustryRepository();

        $initTotalIndustries = $dbIndustryRepository->all()->count();

        $actualCompanies = factory(Industry::class, 2)->create();

        $expectedIndustries = $dbIndustryRepository->all();

        $this->assertSame($initTotalIndustries + 2, $expectedIndustries->count());

        $this->assertSame(
            array_only($expectedIndustries->toArray(), $expectedIndustries[ 0 ]->getFillable()),
            array_only($actualCompanies->toArray(), $expectedIndustries[ 0 ]->getFillable())
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

    /** @test */
    public function it_returns_companies_of_an_industry()
    {
        $dbIndustryRepository = new DbIndustryRepository();
        $industry = factory(Industry::class)->create();
        $companies = factory(Company::class, 2)->create(['industry_id' => $industry->id]);
        $actualCompanies = $dbIndustryRepository->getCompanies($industry);
        $keys = $companies->get(0)->getFillable();

        $this->assertSame(
            array_only($companies->toArray(), $keys),
            array_only($actualCompanies->toArray(), $keys)
        );
    }

    /** @test */
    public function it_returns_work_groups_of_an_industry()
    {
        $dbIndustryRepository = new DbIndustryRepository();
        $industry = factory(Industry::class)->create();
        $expectedWorkGroups = factory(Workgroup::class, 2)->create();
        $keys = $expectedWorkGroups->get(0)->getFillable();

        $actualWorkGroups = $dbIndustryRepository->getWorkGroups($industry);

        $this->assertCount(0, $actualWorkGroups);

        $this->assertNotFalse(
            $dbIndustryRepository->assignWorkGroupsById($industry,
                [$expectedWorkGroups->get(0)->id, $expectedWorkGroups->get(1)->id]));

        $actualWorkGroups = $dbIndustryRepository->getWorkGroups($industry);

        $this->assertCount(2, $actualWorkGroups);

        $this->assertSame(
            array_only($expectedWorkGroups->get(0)->toArray(), $keys),
            array_only($actualWorkGroups->get(0)->toArray(), $keys));

        $this->assertSame(
            array_only($expectedWorkGroups->get(1)->toArray(), $keys),
            array_only($actualWorkGroups->get(1)->toArray(), $keys));
    }

    /** @test */
    public function it_assigns_work_groups_to_an_industry()
    {
        $industry = factory(Industry::class)->create();
        $workGroups = factory(Workgroup::class, 2)->create();

        $this->assertSame(0, $industry->workgroups()->count());

        $dbIndustryRepository = new DbIndustryRepository();
        $dbIndustryRepository->assignWorkGroupsById($industry, [$workGroups->get(0)->id, $workGroups->get(1)->id,]);
        $actualWorkgroups = $industry->workgroups;

        $this->assertNotSame(0, $actualWorkgroups->count());

        $this->assertSame(
            array_only($workGroups->get(0)->toArray(), $workGroups->get(0)->getFillable()),
            array_only($actualWorkgroups->get(0)->toArray(), $workGroups->get(0)->getFillable()));

        $this->assertSame(
            array_only($workGroups->get(1)->toArray(), $workGroups->get(0)->getFillable()),
            array_only($actualWorkgroups->get(1)->toArray(), $workGroups->get(0)->getFillable()));
    }

    /** @test */
    public function it_paginates_work_groups_of_an_industry()
    {
        $dbIndustryRepository = new DbIndustryRepository();
        $industry = factory(Industry::class)->create();
        $expectedWorkGroups = factory(Workgroup::class, 11)->create();
        $keys = $expectedWorkGroups->get(0)->getFillable();

        $actualWorkGroups = $dbIndustryRepository->paginateWorkGroups($industry);

        $this->assertCount(0, $actualWorkGroups);

        $this->assertNotFalse(
            $dbIndustryRepository->assignWorkGroupsById($industry,
                $expectedWorkGroups->lists('id')->toArray()));

        $actualWorkGroups = $dbIndustryRepository->paginateWorkGroups($industry);

        $this->assertCount(10, $actualWorkGroups);

        $this->assertSame(
            array_only($expectedWorkGroups->get(0)->toArray(), $keys),
            array_only($actualWorkGroups->get(0)->toArray(), $keys));

        $this->assertSame(
            array_only($expectedWorkGroups->get(1)->toArray(), $keys),
            array_only($actualWorkGroups->get(1)->toArray(), $keys));
    }

    /** @test */
    public function it_returns_all_companies_events_by_industry()
    {
        $dbCompanyRepository = new DbCompanyRepository();
        $dbIndustryRepository = new DbIndustryRepository();

        $industry = factory(Industry::class)->create();
        $companies = factory(Company::class, 2)->create(['industry_id' => $industry->id]);
        $events0 = factory(Event::class, 2)->create();
        $events1 = factory(Event::class, 2)->create();

        $events = $dbIndustryRepository->companyEvents($industry)->get();

        $this->assertCount(0, $events);

        $this->assertNotFalse($dbCompanyRepository->assignEvents($companies->get(0), $events0));
        $this->assertNotFalse($dbCompanyRepository->assignEvents($companies->get(1), $events1));

        $events = $dbIndustryRepository->companyEvents($industry)->get();

        $this->assertCount(4, $events);

        $this->assertSame(
            $events0->merge($events1)->lists('id')->toArray(),
            $events->lists('id')->toArray());
    }
}

