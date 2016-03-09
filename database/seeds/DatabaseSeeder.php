<?php namespace database\seeds;

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

		// Careful with orders
		$this->call(UserTableSeeder::class);
		$this->call(TagTableSeeder::class);
		$this->call(IndustryTableSeeder::class);
		$this->call(CountryTableSeeder::class);
		$this->call(CompanyTableSeeder::class);
		$this->call(WorkgroupTableSeeder::class);
		$this->call(ArticleTableSeeder::class);
		$this->call(ServiceTableSeeder::class);
		$this->call(EventTableSeeder::class);
		$this->call(FileTableSeeder::class);

		Model::reguard();
	}
}

