<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   16/2/2016
 */
namespace database\seeds;

use App\Ahk\Repositories\Company\DbCompanyRepository;
use App\Ahk\Repositories\Service\DbServiceRepository;
use App\Ahk\Service;
use Faker\Factory;
use Illuminate\Database\Seeder;

/**
 * Class ServiceTableSeeder.
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
        Service::create(['name' => 'Knowledge Exchange', 'color' => Service::$colors[array_rand(Service::$colors)]]);
        Service::create(['name' => 'Corporations', 'color' => Service::$colors[array_rand(Service::$colors)]]);
        Service::create(['name' => 'Buyer', 'color' => Service::$colors[array_rand(Service::$colors)]]);
        Service::create(['name' => 'Supplier', 'color' => Service::$colors[array_rand(Service::$colors)]]);
        Service::create(['name' => 'Expertise', 'color' => Service::$colors[array_rand(Service::$colors)]]);
        Service::create(['name' => 'New Products', 'color' => Service::$colors[array_rand(Service::$colors)]]);
        Service::create(['name' => 'Products', 'color' => Service::$colors[array_rand(Service::$colors)]]);
        Service::create(['name' => 'Partnership', 'color' => Service::$colors[array_rand(Service::$colors)]]);

        $dbServiceRepository = new DbServiceRepository();
        $dbCompanyRepository = new DbCompanyRepository();
        $faker = Factory::create();

        $services = $dbServiceRepository->all()->toArray();

        foreach ($dbCompanyRepository->all() as $company) {
            $company->services()->attach([
                $faker->randomElement($services)['id'] => ['offers' => true],
                $faker->randomElement($services)['id'] => ['offers' => true],
                $faker->randomElement($services)['id'] => ['offers' => true],
                $faker->randomElement($services)['id'] => ['offers' => true],
            ]);

            $company->services()->attach([
                $faker->randomElement($services)['id'] => ['requires' => true],
                $faker->randomElement($services)['id'] => ['requires' => true],
                $faker->randomElement($services)['id'] => ['requires' => true],
                $faker->randomElement($services)['id'] => ['requires' => true],
            ]);
        }
    }
}
