<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   25/11/2015
 */

namespace database\seeds;


use App\Ahk\Decision;
use App\Ahk\Repositories\Company\DbCompanyRepository;
use Illuminate\Database\Seeder;

class DecisionTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$dbCompanyRepository = new DbCompanyRepository();

		foreach ($dbCompanyRepository->all() as $company)
		{
			$decisions = factory(Decision::class, 2)->create();

			$dbCompanyRepository->assignDecisions($company, $decisions);
		}
	}
}

