<?php

use database\seeds\ArticleCategoryTableSeeder;
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
		$this->call(ArticleCategoryTableSeeder::class);

		Model::reguard();
	}
}
