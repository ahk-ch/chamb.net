<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   25/11/2015
 */
namespace database\seeds;

use App\Ahk\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => Role::COMPANY_REPRESENTATIVE_ROLE]);
        Role::create(['name' => Role::AUTHOR_ROLE]);
        Role::create(['name' => Role::ADMINISTRATOR_ROLE]);
    }
}
