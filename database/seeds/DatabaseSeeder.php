<?php

use database\seeds\ArticleIndustryTableSeeder;
use database\seeds\ArticleTableSeeder;
use database\seeds\IndustryTableSeeder;
use database\seeds\TagTableSeeder;
use database\seeds\CompanyTableSeeder;
use database\seeds\UserTableSeeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		$this->call(UserTableSeeder::class);
		$this->call(TagTableSeeder::class);
		$this->call(IndustryTableSeeder::class);
		$this->call(CompanyTableSeeder::class);
		$this->call(ArticleTableSeeder::class);

		Model::reguard();
	}
}
