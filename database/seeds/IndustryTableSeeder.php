<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   25/11/2015
 */
namespace database\seeds;

use App\Ahk\Repositories\Industry\DbIndustryRepository;
use App\Ahk\Repositories\User\DbUserRepository;
use Illuminate\Database\Seeder;

class IndustryTableSeeder extends Seeder
{
    public static $industriesData = [
        ['name' => 'Health', 'fontawesome' => 'fa fa-heartbeat'],
        ['name' => 'Logistics', 'fontawesome' => 'fa fa-bar-chart'],
        ['name' => 'Energy', 'fontawesome' => 'fa fa-sun-o'],
        ['name' => 'Trade', 'fontawesome' => 'fa fa-exchange'],
        ['name' => 'Law', 'fontawesome' => 'fa fa-university'],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dbIndustryRepository = new DbIndustryRepository();
        $dbUserRepository = new DbUserRepository();

        $authorUser = $dbUserRepository->findByEmail(env('COMPANY_REPRESENTATIVE_EMAIL'));

        foreach (static::$industriesData as $industryData) {
            $dbIndustryRepository->store($authorUser, $industryData);
        }
    }
}
