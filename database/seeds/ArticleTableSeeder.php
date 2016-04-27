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
use App\Ahk\Tag;
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
        $faker = Factory::create();

        $dbIndustryRepository = new DbIndustryRepository();
        $dbArticleRepository = new DbArticleRepository();
        $dbTagRepository = new DbTagRepository();
        $industries = $dbIndustryRepository->all();
        $tags = $dbTagRepository->all()->get();

        foreach ($industries as $industry) {
            $articles = factory(Article::class, 'without_industry', 2)->create(['industry_id' => $industry->id, 'publish' => 1]);

            $dbArticleRepository->assignTags($articles->get(0), [
                $tags->random()->id,
                $tags->random()->id
            ]);

            $dbArticleRepository->assignTags($articles->get(1), [
                $tags->random()->id,
                $tags->random()->id
            ]);
        }
    }
}
