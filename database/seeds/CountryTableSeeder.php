<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   25/11/2015
 */

namespace database\seeds;


use App\Ahk\Article;
use App\Ahk\Country;
use App\Ahk\Repositories\Article\DbArticleRepository;
use App\Ahk\Repositories\Tag\DbTagRepository;
use Faker\Factory;
use Illuminate\Database\Seeder;

class CountryTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		factory(Country::class)->create(['name' => 'Greece']);

		factory(Country::class)->create(['name' => 'Germany']);
	}
}