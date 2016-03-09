<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   25/11/2015
 */

namespace database\seeds;


use App\Ahk\Company;
use App\Ahk\File;
use App\Ahk\Repositories\Company\DbCompanyRepository;
use App\Ahk\Repositories\Country\DbCountryRepository;
use App\Ahk\Repositories\Industry\DbIndustryRepository;
use App\Ahk\Repositories\Service\DbServiceRepository;
use App\Ahk\Repositories\User\DbUserRepository;
use Faker\Factory;
use Illuminate\Database\Seeder;

class FileTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$dbCompanyRepository = new DbCompanyRepository();
		$faker = Factory::create();

		foreach ($dbCompanyRepository-> as $company)
		{
			$company = factory(Company::class, 'without_relations')->create([
				'name'        => $company['name'],
				'description' => $company['description'],
				'industry_id' => $faker->randomElement($industries->toArray())['id'],
				'country_id'  => $faker->randomElement($countries)['id'],
				'user_id'     => $faker->randomElement($companyRepresentativeUsers)['id'],
				'logo_id'     => factory(File::class)->create()->id,]);

			$dbCompanyRepository->assignFiles($company, factory(File::class, 2)->create());

			$company->services()->attach([
				$faker->randomElement($services)['id'] => ['offers' => true],
				$faker->randomElement($services)['id'] => ['offers' => true],
				$faker->randomElement($services)['id'] => ['offers' => true],
				$faker->randomElement($services)['id'] => ['offers' => true],]);

			$company->services()->attach([
				$faker->randomElement($services)['id'] => ['requires' => true],
				$faker->randomElement($services)['id'] => ['requires' => true],
				$faker->randomElement($services)['id'] => ['requires' => true],
				$faker->randomElement($services)['id'] => ['requires' => true],]);
		}

		foreach ($industries as $industry)
		{
			factory(Company::class, 'without_industry', 11)->create(['industry_id' => $industry->id])
				->each(function (Company $company) use ($services, $faker, $dbCompanyRepository)
				{
					$dbCompanyRepository->assignFiles($company, factory(File::class, 2)->create());

					$company->services()->attach([
						$faker->randomElement($services)['id'] => ['offers' => true],
						$faker->randomElement($services)['id'] => ['offers' => true],
						$faker->randomElement($services)['id'] => ['offers' => true],
						$faker->randomElement($services)['id'] => ['offers' => true],]);

					$company->services()->attach([
						$faker->randomElement($services)['id'] => ['requires' => true],
						$faker->randomElement($services)['id'] => ['requires' => true],
						$faker->randomElement($services)['id'] => ['requires' => true],
						$faker->randomElement($services)['id'] => ['requires' => true],]);
				});
		}
	}
}

