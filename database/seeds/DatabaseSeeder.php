<?php

use database\seeds\ArticleIndustryTableSeeder;
use database\seeds\ArticleTableSeeder;
use database\seeds\CountryTableSeeder;
use database\seeds\IndustryTableSeeder;
use database\seeds\ServiceTableSeeder;
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

		$this->call(ServiceTableSeeder::class);

//		$this->call(TagTableSeeder::class);

		$this->call(IndustryTableSeeder::class);

//		$this->call(ArticleTableSeeder::class);

//		$this->call(CountryTableSeeder::class);

		$this->call(CompanyTableSeeder::class);


		Model::reguard();
	}
}
