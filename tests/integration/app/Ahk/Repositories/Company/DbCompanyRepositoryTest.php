<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   17/12/2015
 */
namespace tests\integration\app\Ahk\Repositories\Company;

use App\Ahk\Company;
use App\Ahk\Country;
use App\Ahk\Decision;
use App\Ahk\Event;
use App\Ahk\File;
use App\Ahk\Industry;
use App\Ahk\Repositories\Company\DbCompanyRepository;
use App\Ahk\Repositories\Industry\DbIndustryRepository;
use App\Ahk\Repositories\User\DbUserRepository;
use App\Ahk\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use tests\TestCase;

/**
 * Class DbCompanyRepositoryTest.
 */
class DbCompanyRepositoryTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * @var
     */
    protected $dbCompanyRepository;

    /** @test */
    public function it_returns_all_companies()
    {
        $dbCompanyRepository = new DbCompanyRepository();

        $this->assertCount(0, $dbCompanyRepository->all());

        $actualCompanies = factory(Company::class, 2)->create();

        $expectedCompanies = $dbCompanyRepository->all();

        $this->assertSame(2, $expectedCompanies->count());

        $this->assertSame(
            array_only($expectedCompanies->toArray(), $expectedCompanies[0]->getFillable()),
            array_only($actualCompanies->toArray(), $expectedCompanies[0]->getFillable()));
    }

    /** @test */
    public function it_returns_companies_by_user()
    {
        $dbCompanyRepository = new DbCompanyRepository();
        $dbUserRepository = new DbUserRepository();
        $companyRepresentativeUser = factory(User::class)->create();
        $dbUserRepository->assignCompanyRepresentativeRole($companyRepresentativeUser);
        factory(Company::class)->create();  // Company validator

        $this->assertCount(0, $dbCompanyRepository->getByUser($companyRepresentativeUser)->get());

        $expectedCompanies = factory(Company::class, 2)->create(['user_id' => $companyRepresentativeUser->id]);

        $actualCompanies = $dbCompanyRepository->getByUser($companyRepresentativeUser)->get();

        $this->assertCount(2, $actualCompanies);

        $keys = $expectedCompanies[0]->getFillable();

        $this->assertSame(
            array_only($expectedCompanies->toArray(), $keys),
            array_only($actualCompanies->toArray(), $keys)
        );
    }

    /** @test */
    public function it_returns_files_of_companies_by_industry()
    {
        $dbCompanyRepository = new DbCompanyRepository();
        $dbIndustryRepository = new DbIndustryRepository();

        $industry = factory(Industry::class)->create();
        $companies = factory(Company::class, 2)->create(['industry_id' => $industry->id]);
        $files0 = factory(File::class, 2)->create();
        $files1 = factory(File::class, 2)->create();

        $files = $dbIndustryRepository->companyFiles($industry)->get();

        $this->assertCount(0, $files);

        $this->assertNotFalse($dbCompanyRepository->assignFiles($companies->get(0), $files0));
        $this->assertNotFalse($dbCompanyRepository->assignFiles($companies->get(1), $files1));

        $files = $dbIndustryRepository->companyFiles($industry)->get();

        $this->assertCount(4, $files);
    }

    /** @test */
    public function it_updates_company_by_user()
    {
        $dbCompanyRepository = new DbCompanyRepository();
        $dbUserRepository = new DbUserRepository();
        $user = factory(User::class)->create();
        $dbUserRepository->assignCompanyRepresentativeRole($user);
        $company = factory(Company::class)->create(['user_id' => $user->id]);
        $newCompanyData = factory(Company::class)->make();
        $expectedIndustry = factory(Industry::class)->create();
        $expectedCountry = factory(Country::class)->create();
        $expectedFile = factory(File::class, 'without_storage')->create();

        $keys = $newCompanyData->getFillable();

        if (false !== ($key = array_search(Company::SLUG, $keys))) {
            unset($keys[$key]);
        }

        $expectedCompanyData = array_only($newCompanyData->toArray(), $keys);
        $currentCompanyData = array_only($company->toArray(), $keys);

        $this->assertNotSame($expectedCompanyData, $currentCompanyData);
        $this->assertNotSame($expectedIndustry->id, $company->industry->id);
        $this->assertNotSame($expectedCountry->id, $company->country->id);
        $this->assertNotSame($expectedFile->id, $company->logo->id);

        $company = $dbCompanyRepository->update($company, $expectedCompanyData + [
                'industry_id' => $expectedIndustry->id,
                'country_id'  => $expectedCountry->id,
                'logo_id'     => $expectedFile->id,
            ]);

        $currentCompanyData = array_only($company->toArray(), $keys);

        $this->assertSame(array_only($expectedCompanyData, $keys), array_only($currentCompanyData, $keys));

        $this->assertSame($expectedIndustry->id, $company->industry->id);
        $this->assertSame($expectedCountry->id, $company->country->id);
    }

    /** @test */
    public function it_creates_company()
    {
        $dbCompanyRepository = new DbCompanyRepository();
        $dbUserRepository = new DbUserRepository();
        $user = factory(User::class)->create();
        $dbUserRepository->assignCompanyRepresentativeRole($user);
        $newCompanyData = factory(Company::class, 'relationless')->make();
        $expectedIndustry = factory(Industry::class)->create();
        $expectedCountry = factory(Country::class)->create();
        $expectedLogo = factory(File::class)->create();

        $expectedPrimaryData = array_only($newCompanyData->toArray(), $newCompanyData->getFillable());
        $expectedData = array_add($expectedPrimaryData, 'industry_id', $expectedIndustry->id);
        $expectedData = array_add($expectedData, 'country_id', $expectedCountry->id);
        $expectedData = array_add($expectedData, 'logo_id', $expectedLogo->id);

        $this->dontSeeInDatabase('companies',
            $expectedPrimaryData + ['industry_id' => $expectedIndustry->id, 'country_id' => $expectedCountry->id]);

        $dbCompanyRepository->store($user, $expectedData);

        $this->seeInDatabase('companies',
            $expectedPrimaryData + ['industry_id' => $expectedIndustry->id, 'country_id' => $expectedCountry->id]);
    }

    /** @test */
    public function it_assigns_user()
    {
        $dbCompanyRepository = new DbCompanyRepository();
        $dbUserRepository = new DbUserRepository();
        $user = factory(User::class)->create();
        $dbUserRepository->assignCompanyRepresentativeRole($user);
        $company = factory(Company::class)->create();

        $this->assertNotSame($company->user->id, $user->id);

        $dbCompanyRepository->assignRepresentativeUser($company, $user);

        $this->assertSame($company->user->id, $user->id);
    }

    /** @test */
    public function it_assigns_industry_by_id()
    {
        $dbCompanyRepository = new DbCompanyRepository();
        $company = factory(Company::class)->create();
        $expectedIndustry = factory(Industry::class)->create();

        $this->assertNotSame($company->industry->id, $expectedIndustry->id);

        $company = $dbCompanyRepository->assignIndustryById($company, $expectedIndustry->id);

        $this->assertSame($company->industry->id, $expectedIndustry->id);
    }

    /** @test */
    public function it_assigns_country_by_id()
    {
        $dbCompanyRepository = new DbCompanyRepository();
        $company = factory(Company::class)->create();
        $expectedCountry = factory(Country::class)->create();

        $this->assertNotSame($company->country->id, $expectedCountry->id);

        $company = $dbCompanyRepository->assignCountryById($company, $expectedCountry->id);

        $this->assertSame($company->country->id, $expectedCountry->id);
    }

    /** @test */
    public function it_assigns_logo_by_id_to_company()
    {
        $dbCompanyRepository = new DbCompanyRepository();
        $company = factory(Company::class)->create();
        $expectedFile = factory(File::class)->create();

        $this->assertNotSame($company->logo->name, $expectedFile->name);

        $company = $dbCompanyRepository->assignLogoById($company, $expectedFile->id);

        $this->assertSame($company->logo->name, $expectedFile->name);
    }

    /** @test */
    public function it_assigns_files_to_company()
    {
        $dbCompanyRepository = new DbCompanyRepository();
        $company = factory(Company::class)->create();
        $expectedFile = factory(File::class)->create();

        $this->assertCount(0, $company->files);
        $company = $dbCompanyRepository->assignFiles($company, [$expectedFile]);
        $this->assertCount(1, $company->files()->get());
        $this->assertSame(
            $company->files()->get()->get(0)->name,
            $expectedFile->name);

        $expectedFile = factory(File::class)->create();
        $expectedFile1 = factory(File::class)->create();

        $company = $dbCompanyRepository->assignFiles($company, [$expectedFile, $expectedFile1]);
        $this->assertCount(3, $company->files()->get());
        $this->assertSame(
            $company->files()->get()->get(2)->name,
            $expectedFile1->name);
    }

    /** @test */
    public function it_assigns_decision_to_company()
    {
        $dbCompanyRepository = new DbCompanyRepository();
        $company = factory(Company::class)->create();
        $expectedDecision = factory(Decision::class)->create();

        $this->assertCount(0, $company->decisions);
        $company = $dbCompanyRepository->assignDecisions($company, [$expectedDecision]);
        $this->assertCount(1, $company->decisions()->get());
        $this->assertSame(
            $company->decisions()->get()->get(0)->name,
            $expectedDecision->name);

        $expectedDecision = factory(Decision::class)->create();
        $expectedDecision1 = factory(Decision::class)->create();

        $company = $dbCompanyRepository->assignDecisions($company, [$expectedDecision, $expectedDecision1]);
        $this->assertCount(3, $company->decisions()->get());
        $this->assertSame(
            $company->decisions()->get()->get(2)->name,
            $expectedDecision1->name);
    }

    /** @test */
    public function it_assigns_events_to_company()
    {
        $dbCompanyRepository = new DbCompanyRepository();
        $company = factory(Company::class)->create();
        $expectedEvent = factory(Event::class)->create();

        $this->assertCount(0, $company->events);
        $company = $dbCompanyRepository->assignEvents($company, [$expectedEvent]);
        $this->assertCount(1, $company->events()->get());
        $this->assertSame($company->events()->get()->get(0)->name, $expectedEvent->name);

        $expectedEvent = factory(Event::class)->create();
        $expectedEvent1 = factory(Event::class)->create();

        $company = $dbCompanyRepository->assignEvents($company, [$expectedEvent, $expectedEvent1]);
        $this->assertCount(3, $company->events()->get());
        $this->assertSame($company->events()->get()->get(2)->name, $expectedEvent1->name);
    }

    /** @test */
    public function it_returns_companies_pagination()
    {
        $dbCompanyRepository = new DbCompanyRepository();
        $expectedCompanies = factory(Company::class, 11)->create();
        $actualCompanies = $dbCompanyRepository->paginate(10);
        $keys = $expectedCompanies->get(0)->getFillable();

        $this->assertCount(10, $actualCompanies);

        $this->assertEquals(
            array_only($expectedCompanies->get(0)->toArray(), $keys),
            array_only($actualCompanies->get(0)->toArray(), $keys));

        $this->assertEquals(
            array_only($expectedCompanies->get(9)->toArray(), $keys),
            array_only($actualCompanies->get(9)->toArray(), $keys));

        $actualCompanies = $dbCompanyRepository->paginate(11);

        $this->assertCount(11, $actualCompanies);
    }
}
