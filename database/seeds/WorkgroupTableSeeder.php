<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   25/11/2015
 */

namespace database\seeds;


use App\Ahk\Company;
use App\Ahk\File;
use App\Ahk\Repositories\Country\DbCountryRepository;
use App\Ahk\Repositories\Industry\DbIndustryRepository;
use App\Ahk\Repositories\Service\DbServiceRepository;
use App\Ahk\Repositories\User\DbUserRepository;
use App\Ahk\RequiresService;
use App\Ahk\Workgroup;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class WorkgroupTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$industries = (new DbIndustryRepository())->all()->get()->toArray();
		$workgroups = factory(Workgroup::class)->create();
		$faker = Factory::create();

		foreach ($workgroups as $workgroup)
		{
			$workgroup->industries()->attach([
				$faker->randomElement($industries)['id'],
				$faker->randomElement($industries)['id'],
				$faker->randomElement($industries)['id'],
				$faker->randomElement($industries)['id'],
			]);

			$workgroup->authors()->attach([
				$faker->randomElement($industries)['id'],
				$faker->randomElement($industries)['id'],
				$faker->randomElement($industries)['id'],
				$faker->randomElement($industries)['id'],
			]);
		}
	}
}