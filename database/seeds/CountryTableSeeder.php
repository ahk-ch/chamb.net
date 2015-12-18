<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   25/11/2015
 */

namespace database\seeds;


use App\AHK\Article;
use App\AHK\Country;
use App\AHK\Repositories\Article\DbArticleRepository;
use App\AHK\Repositories\Tag\DbTagRepository;
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