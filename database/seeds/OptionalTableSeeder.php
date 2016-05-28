<?php

use database\seeds\ArticleTableSeeder;
use database\seeds\CompanyTableSeeder;
use database\seeds\DecisionTableSeeder;
use database\seeds\EventTableSeeder;
use database\seeds\FileTableSeeder;
use database\seeds\WorkgroupTableSeeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class OptionalTableSeeder extends Seeder
{
    /**
     * Run the database seeds. Note these seeds are used for production server.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(ArticleTableSeeder::class);
        $this->call(EventTableSeeder::class);
        $this->call(DecisionTableSeeder::class);
        $this->call(FileTableSeeder::class);
        $this->call(CompanyTableSeeder::class);
        $this->call(WorkgroupTableSeeder::class);
        $this->call(IndustryWorkgroupTableSeeder::class);

        Model::reguard();
    }
}
