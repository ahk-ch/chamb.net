<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   25/11/2015
 */
namespace database\seeds;

use App\Ahk\Repositories\Industry\DbIndustryRepository;
use App\Ahk\Repositories\User\DbUserRepository;
use App\Ahk\Repositories\Workgroup\DbWorkgroupRepository;
use App\Ahk\Workgroup;
use Illuminate\Database\Seeder;

/**
 * Class WorkgroupTableSeeder.
 */
class WorkgroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dbUserRepository = new DbUserRepository();
        $dbWorkgroupRepository = new DbWorkgroupRepository();

        $authorUser = $dbUserRepository->findByEmail(env('COMPANY_REPRESENTATIVE_EMAIL'));

        $dbWorkgroupRepository->storeAndAssignCreatorByUser([
            Workgroup::NAME        => "Work Group 1",
            Workgroup::DESCRIPTION => "Work Group Description",
        ], $authorUser);

        $dbWorkgroupRepository->storeAndAssignCreatorByUser([
            Workgroup::NAME        => "Work Group 2",
            Workgroup::DESCRIPTION => "Work Group Description",
        ], $authorUser);
    }
}
