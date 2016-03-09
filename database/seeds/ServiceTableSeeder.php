<?php namespace database\seeds;

use App\Ahk\Repositories\Company\DbCompanyRepository;
use App\Ahk\Repositories\Service\DbServiceRepository;
use Faker\Factory;
use Illuminate\Database\Seeder;

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/2/2016
 */
class ServiceTableSeeder extends Seeder
{

	/**
	 * Run the database seeds. Services have been inserted on creation.
	 *
	 * @return void
	 */
	public function run()
	{
		$dbServiceRepository = new DbServiceRepository();
		$dbCompanyRepository = new DbCompanyRepository();
		$faker = Factory::create();

		$services = $dbServiceRepository->all()->toArray();

		foreach ($dbCompanyRepository->all() as $company)
		{
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
	}
}

