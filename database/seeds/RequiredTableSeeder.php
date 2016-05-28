<?php

use database\seeds\CountryTableSeeder;
use database\seeds\IndustryTableSeeder;
use database\seeds\RoleTableSeeder;
use database\seeds\ServiceTableSeeder;
use database\seeds\TagTableSeeder;
use database\seeds\UserTableSeeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class RequiredTableSeeder extends Seeder
{
    /**
     * Run the database seeds. Note these seeds are used for production server.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(TagTableSeeder::class);
        $this->call(IndustryTableSeeder::class);
        $this->call(CountryTableSeeder::class);
        $this->call(ServiceTableSeeder::class);


        Model::reguard();
    }
}
