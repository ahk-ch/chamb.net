<?php

use database\seeds\ArticleTableSeeder;
use database\seeds\CompanyTableSeeder;
use database\seeds\CountryTableSeeder;
use database\seeds\IndustryTableSeeder;
use database\seeds\ServiceTableSeeder;
use database\seeds\TagTableSeeder;
use database\seeds\UserTableSeeder;
use database\seeds\WorkgroupTableSeeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UserTableSeeder::class);
        $this->call(ServiceTableSeeder::class);
        $this->call(TagTableSeeder::class);
        $this->call(IndustryTableSeeder::class);
        $this->call(CountryTableSeeder::class);
        $this->call(CompanyTableSeeder::class);
        $this->call(WorkgroupTableSeeder::class);
        $this->call(ArticleTableSeeder::class);

        Model::reguard();
    }
}

