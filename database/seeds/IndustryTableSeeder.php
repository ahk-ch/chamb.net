<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   25/11/2015
 */

namespace database\seeds;


use App\Ahk\Company;
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

		$industries = $dbIndustryRepository->all();

		foreach ($industries as $industry) {
			factory(Company::class, 'without_industry', 11)->create(['industry_id' => $industry->id]);
		}
	}
}

