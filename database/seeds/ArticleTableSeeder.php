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
        $faker = Factory::create();

        $industries = $dbIndustryRepository->all()->toArray();

        foreach (range(0, 13) as $index) {
            factory(Article::class, 'without_industry')->create(['industry_id' => $faker->randomElement($industries)['id']]);
        }
    }
}

