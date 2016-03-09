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
use App\Ahk\Repositories\DbEventRepository;
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
		$dbEventRepository = new DbEventRepository();

		foreach ($dbCompanyRepository->all() as $company)
		{
			$files = factory(File::class, 2)->create();

			$dbCompanyRepository->assignFiles($company, $files);
		}

		foreach ($dbEventRepository->all() as $company)
		{
			$files = factory(File::class, 2)->create();

			$dbCompanyRepository->assignFiles($company, $files);
		}
	}
}

