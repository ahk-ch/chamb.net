<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   25/11/2015
 */
namespace database\seeds;

use App\Ahk\Repositories\Country\DbCountryRepository;
use Illuminate\Database\Seeder;

class CountryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dbCountryRepository = new DbCountryRepository();

        $dbCountryRepository->store(['name' => 'Greece']);
        $dbCountryRepository->store(['name' => 'Germany']);
    }
}
