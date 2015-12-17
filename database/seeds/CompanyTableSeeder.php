<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   25/11/2015
 */

namespace database\seeds;


use App\AHK\Company;
use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		factory(Company::class, 13)->create();
	}
}