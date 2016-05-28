<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   25/11/2015
 */
namespace database\seeds;

use App\Ahk\Repositories\User\DbUserRepository;
use App\Ahk\Repositories\Workgroup\DbWorkgroupRepository;
use Illuminate\Database\Seeder;

/**
 * Class WorkgroupTableSeeder.
 */
class WorkgroupTableSeeder extends Seeder
{
    public static $workgroupsData = [
        ['name' => 'Work Group 1', 'description' => 'Work Group 1 Description'],
        ['name' => 'Work Group 2', 'description' => 'Work Group 2 Description'],
    ];

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

        foreach (static::$workgroupsData as $workgroupData) {
            $dbWorkgroupRepository->storeAndAssignCreatorByUser([
                'name'        => $workgroupData['name'],
                'description' => $workgroupData['description'],
            ], $authorUser);
        }
    }
}
