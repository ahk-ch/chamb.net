<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   18/2/2016
 */

namespace tests\functional\ahk\companyRepresentative;

use App\Ahk\Company;
use App\Ahk\Repositories\User\DbUserRepository;
use App\Ahk\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use tests\TestCase;

class CompaniesTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function it_reads_owned_companies_index()
	{
		$dbUserRepository = new DbUserRepository();
		$companyRepresentativeUser = factory(User::class)->create();
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

		$this->actingAs($companyRepresentativeUser)
			->visit(route('my.companies.edit', ['slug' => $company->slug]))
			->see($company->name)
			->see($company->business_leader)
			->see($company->address)
			->see($company->email)
			->see($company->phone_number)
			->see($company->focus)
			->see($company->description)
			->see($company->logo);
	}

	/** @test */
	public function it_updates_company_data()
	{
		$dbUserRepository = new DbUserRepository();
		$companyRepresentativeUser = factory(User::class)->create();
		$dbUserRepository->assignCompanyRepresentativeRole($companyRepresentativeUser);
		$company = factory(Company::class)->create(['user_id' => $companyRepresentativeUser->id]);
		$expectedCompany = factory(Company::class)->make(['user_id' => $companyRepresentativeUser->id]);

		$this->actingAs($companyRepresentativeUser)
			->visit(route('my.companies.edit', ['slug' => $company->slug]))
			->type($expectedCompany->name, 'nameInputField')
			->type($expectedCompany->business_leader, 'businessLeaderInputField')
			->type($expectedCompany->address, 'addressInputField')
			->type($expectedCompany->email, 'emailInputField')
			->type($expectedCompany->phone_number, 'phoneNumberInputField')
			->type($expectedCompany->focus, 'focusInputField')
			->type($expectedCompany->description, 'descriptionInputField')
			->attach(storage_path() . '/tests/dummy_logo.png', 'logoInputField')
			->seePageIs(route('my.companies.edit', ['slug' => $company->slug]))
			->see(trans('ahk_messages.company_successfully_updated'))
			->see($expectedCompany->name)
			->see($expectedCompany->business_leader)
			->see($expectedCompany->address)
			->see($expectedCompany->email)
			->see($expectedCompany->phone_number)
			->see($expectedCompany->focus)
			->see($expectedCompany->description)
			->see($expectedCompany->logo);
	}
}