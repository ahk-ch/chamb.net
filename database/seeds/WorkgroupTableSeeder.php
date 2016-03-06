<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   25/11/2015
 */

namespace database\seeds;


use App\Ahk\Repositories\Industry\DbIndustryRepository;
use App\Ahk\Repositories\User\DbUserRepository;
use App\Ahk\Workgroup;
use Faker\Factory;
use Illuminate\Database\Seeder;

class WorkgroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $industries = (new DbIndustryRepository())->all()->toArray();
        $authors = (new DbUserRepository())->getWithAuthorRole()->toArray();
        $workgroups = factory(Workgroup::class, 2)->create();
        $faker = Factory::create();

        foreach ($workgroups as $workgroup) {
            $workgroup->industries()->attach([
                $faker->randomElement($industries)['id'],
                $faker->randomElement($industries)['id'],
                $faker->randomElement($industries)['id'],
                $faker->randomElement($industries)['id'],
            ]);

            $workgroup->authors()->attach([
                $faker->randomElement($authors)['id'],
                $faker->randomElement($authors)['id'],
                $faker->randomElement($authors)['id'],
                $faker->randomElement($authors)['id'],
            ]);
        }
    }
}

