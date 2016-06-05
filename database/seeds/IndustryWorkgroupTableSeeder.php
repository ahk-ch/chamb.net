<?php

use App\Ahk\Repositories\Industry\DbIndustryRepository;
use App\Ahk\Repositories\Workgroup\DbWorkgroupRepository;
use Illuminate\Database\Seeder;

class IndustryWorkgroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dbWorkgroupRepository = new DbWorkgroupRepository();
        $dbIndustryRepository = new DbIndustryRepository();
        $workgroups = $dbWorkgroupRepository->all();
        $industries = $dbIndustryRepository->all();

        foreach ($industries as $industry) {
            $dbIndustryRepository->assignWorkGroupsById($industry, $workgroups->pluck('id')->toArray());
        }
    }
}
