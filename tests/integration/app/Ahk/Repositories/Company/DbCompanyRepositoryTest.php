<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   17/12/2015
 */

namespace tests\integration\app\Ahk\Repositories\Company;

use App\Ahk\Company;
use App\Ahk\Country;
use App\Ahk\File;
use App\Ahk\Industry;
use App\Ahk\Repositories\Company\DbCompanyRepository;
use App\Ahk\Repositories\User\DbUserRepository;
use App\Ahk\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Storage;
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
	public function it_paginates_companies()
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

	/** @test */
	public function it_returns_companies_by_user()
	{
		$dbCompanyRepository = new DbCompanyRepository();
		$dbUserRepository = new DbUserRepository();
		$companyRepresentativeUser = factory(User::class)->create();
		$dbUserRepository->assignCompanyRepresentativeRole($companyRepresentativeUser);
		factory(Company::class)->create();  # Company validator

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
		$expectedFile = factory(File::class, 'with_primary_data')->create();

		$keys = $newCompanyData->getFillable();
		$expectedCompanyData = array_only($newCompanyData->toArray(), $keys);
		$currentCompanyData = array_only($company->toArray(), $keys);

		$this->assertNotSame($expectedCompanyData, $currentCompanyData);
		$this->assertNotSame($expectedIndustry->id, $company->industry->id);
		$this->assertNotSame($expectedCountry->id, $company->country->id);
		$this->assertNotSame($expectedFile->id, $company->logo->id);

		$company = $dbCompanyRepository->update($company, $expectedCompanyData + [
				'industry_id' => $expectedIndustry->id,
				'country_id'  => $expectedCountry->id,
				'file_id'     => $expectedFile->id,
			]);

		$currentCompanyData = array_only($company->toArray(), $keys);

		$this->assertSame($expectedCompanyData, $currentCompanyData);
		$this->assertSame($expectedIndustry->id, $company->industry->id);
		$this->assertSame($expectedCountry->id, $company->country->id);
		$this->assertSame($expectedFile->id, $company->logo->id);
	}

	/** @test */
	public function it_updates_company_logo()
	{
		$dbCompanyRepository = new DbCompanyRepository();
		$dbUserRepository = new DbUserRepository();
		$user = factory(User::class)->create();
		$dbUserRepository->assignCompanyRepresentativeRole($user);
		$company = factory(Company::class)->create(['user_id' => $user->id]);

		$tempLogoLocation = 'storage/app/testing/dummy_logo.png';

		Storage::delete($company->logo);

		$this->assertFalse(Storage::exists($company->logo));

		$company->logo = null;
		$company->save();

		$this->assertNull($company->logo);

		$dbCompanyRepository->updateLogo($company, $tempLogoLocation);

		$this->assertTrue(Storage::exists($company->logo));
	}

	/** @test */
	public function it_creates_company()
	{
		$dbCompanyRepository = new DbCompanyRepository();
		$dbUserRepository = new DbUserRepository();
		$user = factory(User::class)->create();
		$dbUserRepository->assignCompanyRepresentativeRole($user);
		$newCompanyData = factory(Company::class)->make();
		$expectedIndustry = factory(Industry::class)->create();
		$expectedCountry = factory(Country::class)->create();

		$expectedPrimaryCompanyData = array_only($newCompanyData->toArray(), $newCompanyData->getFillable());
		$expectedAllCompanyData = array_add($expectedPrimaryCompanyData, 'industry_id', $expectedIndustry->id);
		$expectedAllCompanyData = array_add($expectedAllCompanyData, 'country_id', $expectedCountry->id);

		$this->dontSeeInDatabase('companies',
			$expectedPrimaryCompanyData + ['industry_id' => $expectedIndustry->id, 'country_id' => $expectedCountry->id]);

		$dbCompanyRepository->store($user, $expectedAllCompanyData);

		$this->seeInDatabase('companies',
			$expectedPrimaryCompanyData + ['industry_id' => $expectedIndustry->id, 'country_id' => $expectedCountry->id]);
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
	public function it_assigns_logo_by_id()
	{
		$dbCompanyRepository = new DbCompanyRepository();
		$company = factory(Company::class)->create();
		$expectedFile = factory(File::class)->create();

		$this->assertNotSame($company->logo->id, $expectedFile->id);

		$company = $dbCompanyRepository->assignLogoById($company, $expectedFile->id);

		$this->assertSame($company->logo->id, $expectedFile->id);
	}

}