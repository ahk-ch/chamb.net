<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   18/2/2016
 */
namespace tests\functional\ahk\companyRepresentative;

use App\Ahk\Company;
use App\Ahk\Country;
use App\Ahk\Industry;
use App\Ahk\Repositories\User\DbUserRepository;
use App\Ahk\Storage\FilesStorage;
use App\Ahk\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use tests\TestCase;

/**
 * Class CompaniesTest.
 */
class CompaniesTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_reads_owned_companies_index()
    {
        $dbUserRepository = new DbUserRepository();
        $companyRepresentativeUser = factory(User::class)->create(['avatar_id' => null]);
        $dbUserRepository->assignCompanyRepresentativeRole($companyRepresentativeUser);

        // Access when on company on data set.
        $this->actingAs($companyRepresentativeUser)
            ->visit(route('my.companies.index')); // check exception due to missing avatar

        $companyRepresentativeUser = factory(User::class)->create([]);
        $dbUserRepository->assignCompanyRepresentativeRole($companyRepresentativeUser);
        $companies = factory(Company::class, 2)->create(['user_id' => $companyRepresentativeUser->id]);
        $companyValidator = factory(Company::class)->create();

        $this->actingAs($companyRepresentativeUser)
            ->visit(route('my.companies.index'))
            ->dontSee($companyValidator->name)
            ->dontSee($companyValidator->description)
            ->see($companies->get(0)->name)
            ->see($companies->get(0)->descrption)
            ->see($companies->get(1)->name)
            ->see($companies->get(1)->descrption);
    }

    /** @test */
    public function it_access_company_edit_page()
    {
        $dbUserRepository = new DbUserRepository();
        $companyRepresentativeUser = factory(User::class)->create();
        $dbUserRepository->assignCompanyRepresentativeRole($companyRepresentativeUser);
        $company = factory(Company::class)->create(['user_id' => $companyRepresentativeUser->id]);

        $this->actingAs($companyRepresentativeUser)
            ->visit(route('my.companies.edit', ['slug' => $company->slug]))
            ->seePageIs(route('my.companies.edit', ['slug' => $company->slug]));

        $this->actingAs($companyRepresentativeUser)
            ->visit(route('my.companies.index'))
            ->click("#edit-company-btn-$company->slug")
            ->seePageIs(route('my.companies.edit', ['slug' => $company->slug]));
    }

    /** @test */
    public function it_reads_company_edit_view_elements()
    {
        $dbUserRepository = new DbUserRepository();
        $companyRepresentativeUser = factory(User::class)->create();
        $dbUserRepository->assignCompanyRepresentativeRole($companyRepresentativeUser);
        $company = factory(Company::class)->create(['user_id' => $companyRepresentativeUser->id]);
        $industries = factory(Industry::class, 2)->create();
        $countries = factory(Country::class, 2)->create();

        $this->actingAs($companyRepresentativeUser)
            ->visit(route('my.companies.edit', ['slug' => $company->slug]))
            ->see($company->name)
            ->see($company->business_leader)
            ->seeIsSelected('industry_id', $company->industry->id)
            ->see($industries->get(0)->id)->see($industries->get(0)->name)
            ->see($industries->get(1)->id)->see($industries->get(1)->name)
            ->seeIsSelected('country_id', $company->country->id)
            ->see($countries->get(0)->id)->see($countries->get(0)->name)
            ->see($countries->get(1)->id)->see($countries->get(1)->name)
            ->see($company->address)
            ->see($company->email)
            ->see($company->phone_number)
            ->see($company->industry->name)
            ->see($company->focus)
            ->see($company->description)
            ->see(route('files.render', ['path' => $company->logo_path]));
    }

    /** @test */
    public function it_updates_company()
    {
        $dbUserRepository = new DbUserRepository();
        $companyRepresentativeUser = factory(User::class)->create();
        $dbUserRepository->assignCompanyRepresentativeRole($companyRepresentativeUser);

        $company = factory(Company::class)->create(['user_id' => $companyRepresentativeUser->id]);
        $expectedCompany = factory(Company::class)->make(['user_id' => $companyRepresentativeUser->id]);

        factory(Industry::class, 2)->create();
        factory(Country::class, 2)->create();

        $expectedIndustry = factory(Industry::class)->create();
        $expectedCountry = factory(Country::class)->create();
        $expectedLogoPath = FilesStorage::getFilesDirectory().'dummy_logo.png';

        $this->actingAs($companyRepresentativeUser)
            ->visit(route('my.companies.edit', ['slug' => $company->slug]))
            ->type($expectedCompany->name, 'name')
            ->select($expectedIndustry->id, 'industry_id')
            ->select($expectedCountry->id, 'country_id')
            ->type($expectedCompany->business_leader, 'business_leader')
            ->type($expectedCompany->address, 'address')
            ->type($expectedCompany->email, 'email')
            ->type($expectedCompany->phone_number, 'phone_number')
            ->type($expectedCompany->focus, 'focus')
            ->type($expectedCompany->description, 'description')
            ->attach(storage_path('app/testing/dummy_logo.png'), 'logo_path')
            ->press(trans('ahk.update'))
            ->see(trans('ahk_messages.company_successfully_updated'))
            ->dontSee($company->name)
            ->see($expectedCompany->name)
            ->seeIsSelected('industry_id', $expectedIndustry->id)
            ->seeIsSelected('country_id', $expectedCountry->id)
            ->see($expectedCompany->business_leader)
            ->see($expectedCompany->address)
            ->see($expectedCompany->email)
            ->see($expectedCompany->phone_number)
            ->see($expectedCompany->focus)
            ->see($expectedCompany->description)
            ->see(route('files.render', ['path' => $expectedLogoPath]));
    }

    /** @test */
    public function it_access_company_create_page()
    {
        $dbUserRepository = new DbUserRepository();
        $companyRepresentativeUser = factory(User::class)->create();
        $dbUserRepository->assignCompanyRepresentativeRole($companyRepresentativeUser);

        $this->actingAs($companyRepresentativeUser)
            ->visit(route('my.companies.create'))
            ->seePageIs(route('my.companies.create'));

        $this->actingAs($companyRepresentativeUser)
            ->visit(route('my.companies.index'))
            ->click('#create-company-btn')
            ->seePageIs(route('my.companies.create'));
    }

    /** @test */
    public function it_reads_company_create_view_elements()
    {
        $dbUserRepository = new DbUserRepository();
        $companyRepresentativeUser = factory(User::class)->create();
        $dbUserRepository->assignCompanyRepresentativeRole($companyRepresentativeUser);
        $industries = factory(Industry::class, 2)->create();
        $countries = factory(Country::class, 2)->create();

        $this->actingAs($companyRepresentativeUser)
            ->visit(route('my.companies.create'))
            ->see(trans('ahk.enter_name'))
            ->see(trans('ahk.enter_business_leader'))
            ->see(trans('ahk.industry'))
            ->see($industries->get(0)->id)->see($industries->get(0)->name)
            ->see($industries->get(1)->id)->see($industries->get(1)->name)
            ->see(trans('ahk.country'))
            ->see($countries->get(0)->id)->see($countries->get(0)->name)
            ->see($countries->get(1)->id)->see($countries->get(1)->name)
            ->see(trans('ahk.address'))
            ->see(trans('ahk.enter_email'))
            ->see(trans('ahk.phone_number'))
            ->see(trans('ahk.enter_focus'))
            ->see(trans('ahk.enter_description'))
            ->see(trans('ahk.logo'));
    }

    /** @test */
    public function it_creates_company()
    {
        $dbUserRepository = new DbUserRepository();
        $companyRepresentativeUser = factory(User::class)->create();
        $dbUserRepository->assignCompanyRepresentativeRole($companyRepresentativeUser);

        factory(Industry::class, 2)->create();
        factory(Country::class, 2)->create();

        $expectedCompany = factory(Company::class, 'without_relations')->make(['user_id' => $companyRepresentativeUser->id]);
        $expectedIndustry = factory(Industry::class)->create();
        $expectedCountry = factory(Country::class)->create();
        $expectedLogoPath = FilesStorage::getFilesDirectory().'dummy_logo.png';

        $this->actingAs($companyRepresentativeUser)
            ->visit(route('my.companies.create'))
            ->type($expectedCompany->name, 'name')
            ->select($expectedIndustry->id, 'industry_id')
            ->select($expectedCountry->id, 'country_id')
            ->type($expectedCompany->business_leader, 'business_leader')
            ->type($expectedCompany->address, 'address')
            ->type($expectedCompany->email, 'email')
            ->type($expectedCompany->phone_number, 'phone_number')
            ->type($expectedCompany->focus, 'focus')
            ->type($expectedCompany->description, 'description')
            ->attach(storage_path('app/testing/dummy_logo.png'), 'logo_path')
            ->press(trans('ahk.create'))
            ->see(trans('ahk_messages.company_successfully_stored'))
            ->see($expectedCompany->name)
            ->seeIsSelected('industry_id', $expectedIndustry->id)
            ->seeIsSelected('country_id', $expectedCountry->id)
            ->see($expectedCompany->business_leader)
            ->see($expectedCompany->address)
            ->see($expectedCompany->email)
            ->see($expectedCompany->phone_number)
            ->see($expectedCompany->focus)
            ->see($expectedCompany->description)
            ->see(route('files.render', ['path' => $expectedLogoPath]));
    }
}
