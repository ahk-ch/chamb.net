<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   25/11/2015
 */

namespace database\seeds;


use App\Ahk\Industry;
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
		factory(Industry::class)->create(['name' => 'Pharmaceutical']);

		factory(Industry::class)->create(['name' => 'Medical technology and products']);

		factory(Industry::class)->create(['name' => 'Healthcare']);

		factory(Industry::class)->create(['name' => 'Health tourism']);
	}
}