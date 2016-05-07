<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   25/11/2015
 */
namespace database\seeds;

use App\Ahk\Article;
use App\Ahk\Repositories\Industry\DbIndustryRepository;
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
        $healthIndustry = $dbIndustryRepository->findByName('Health');

        factory(Article::class, 'without_industry', 3)->create(['industry_id' => $healthIndustry->id, 'publish' => 1]);
    }
}
