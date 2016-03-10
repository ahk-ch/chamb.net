<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   25/11/2015
 */

namespace database\seeds;


use App\Ahk\Article;
use App\Ahk\Repositories\Industry\DbIndustryRepository;
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
		$industries = $dbIndustryRepository->all();

		foreach ($industries as $industry)
		{
			factory(Article::class, 'without_industry', 2)->create(['industry_id' => $industry->id, 'publish' => 1]);
        }
	}
}

