<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds. Note these seeds are used for production server.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();


        $this->call(RequiredTableSeeder::class);
        
        $this->call(OptionalTableSeeder::class);

        Model::reguard();
    }
}
