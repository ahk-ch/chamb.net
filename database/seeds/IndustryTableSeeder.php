<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   25/11/2015
 */

namespace database\seeds;


use App\Ahk\Company;
use App\Ahk\File;
use App\Ahk\Repositories\Company\DbCompanyRepository;
use App\Ahk\Repositories\Industry\DbIndustryRepository;
use Illuminate\Database\Seeder;

class IndustryTableSeeder extends Seeder
{

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$dbIndustryRepository = new DbIndustryRepository();
		$dbCompanyRepository = new DbCompanyRepository();

		$industries = $dbIndustryRepository->all();

		foreach ($industries as $industry)
		{
			factory(Company::class, 'without_industry', 11)->create(['industry_id' => $industry->id])
				->each(function ($company) use ($dbCompanyRepository)
				{
					$files = factory(File::class, 2)->create();

					$dbCompanyRepository->assignFiles($company, $files);
				});
		}
	}
}

