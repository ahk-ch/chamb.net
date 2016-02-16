<?php namespace database\seeds;

use App\Ahk\Service;
use Illuminate\Database\Seeder;

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/2/2016
 */
class ServiceTableSeeder extends Seeder
{

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		factory(Service::class)->create(['name' => 'Knowledge Exchange', 'color' => Service::$colors[array_rand(Service::$colors)]]);
		factory(Service::class)->create(['name' => 'Corporations', 'color' => Service::$colors[array_rand(Service::$colors)]]);
		factory(Service::class)->create(['name' => 'Buyer', 'color' => Service::$colors[array_rand(Service::$colors)]]);
		factory(Service::class)->create(['name' => 'Supplier', 'color' => Service::$colors[array_rand(Service::$colors)]]);
		factory(Service::class)->create(['name' => 'Expertise', 'color' => Service::$colors[array_rand(Service::$colors)]]);
		factory(Service::class)->create(['name' => 'New Products', 'color' => Service::$colors[array_rand(Service::$colors)]]);
		factory(Service::class)->create(['name' => 'Products', 'color' => Service::$colors[array_rand(Service::$colors)]]);
		factory(Service::class)->create(['name' => 'Partnership', 'color' => Service::$colors[array_rand(Service::$colors)]]);
	}
}