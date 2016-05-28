<?php

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
        $dbWorkgroupRepository->all();
       
        // todo continue
    }
}
