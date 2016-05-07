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
    /**
     * Run the database seeds. Only six industries should be on database. Already inserted on creation.
     *
     * @return void
     */
    public function run()
    {
        $dbIndustryRepository = new DbIndustryRepository();
        $dbUserRepository = new DbUserRepository();

        $authorUser = $dbUserRepository->findByEmail(env('COMPANY_REPRESENTATIVE_EMAIL'));

        $dbIndustryRepository->store($authorUser, ['name' => 'Health', 'fontawesome' => 'fa fa-heartbeat']);
        $dbIndustryRepository->store($authorUser, ['name' => 'Logistics', 'fontawesome' => 'fa fa-bar-chart']);
        $dbIndustryRepository->store($authorUser, ['name' => 'Energy', 'fontawesome' => 'fa fa-sun-o']);
        $dbIndustryRepository->store($authorUser, ['name' => 'Trade', 'fontawesome' => 'fa fa-exchange']);
        $dbIndustryRepository->store($authorUser, ['name' => 'Law', 'fontawesome' => 'fa fa-university']);
    }
}
