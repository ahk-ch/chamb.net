<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   25/11/2015
 */

namespace database\seeds;


use App\AHK\Article;
use App\AHK\Repositories\Article\DbArticleRepository;
use App\AHK\Repositories\Tag\DbTagRepository;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ArticleTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$dbArticleRepository = new DbArticleRepository();
		$dbTagRepository = new DbTagRepository();
		$faker = Factory::create();

		factory(Article::class, 26)->create();

		$articles = $dbArticleRepository->all()->get();
		$tags = $dbTagRepository->all()->get()->toArray();

		foreach ($articles as $article)
		{
			$randomTag = $faker->randomElement($tags);

			$dbArticleRepository->updateTagsById($article->id, [$randomTag['id']]);
		}
	}
}