<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   25/11/2015
 */

namespace database\seeds;


use App\Ahk\Article;
use App\Ahk\Repositories\Article\DbArticleRepository;
use App\Ahk\Repositories\Industry\DbIndustryRepository;
use App\Ahk\Repositories\Tag\DbTagRepository;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ArticleTableSeeder extends Seeder
{

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$dbIndustryRepository = new DbIndustryRepository();
		$faker = Factory::create();

		$industries = $dbIndustryRepository->all()->get()->toArray();

		foreach (range(0, 13) as $index)
		{
			factory(Article::class, 'without_industry')->create(['industry_id' => $faker->randomElement($industries)['id']]);
		}
	}
}