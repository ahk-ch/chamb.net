<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   25/11/2015
 */
namespace database\seeds;

use App\Ahk\Repositories\Industry\DbIndustryRepository;
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
        $dbIndustryRepository = new DbIndustryRepository();
        $industries = (new DbIndustryRepository())->all();

        foreach ($industries as $industry) {
            $workGroups = factory(Workgroup::class, 2)->create();

            $workGroupIds = $workGroups->lists('id')->toArray();
            $dbIndustryRepository->assignWorkGroupsById($industry, $workGroupIds);
        }
    }
}

