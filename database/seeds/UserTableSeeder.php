<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   25/11/2015
 */
namespace database\seeds;

use App\Ahk\Repositories\User\DbUserRepository;
use Hash;
use Illuminate\Database\Seeder;

/**
 * Class UserTableSeeder.
 */
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dbUserRepository = new DbUserRepository();

        $administrator = $dbUserRepository->store([
            'email'    => env('ADMIN_EMAIL'),
            'password' => Hash::make(env('ADMIN_PASSWORD')),
            'verified' => 1,
        ]);

        $companyRepresentative = $dbUserRepository->store([
            'email'    => env('COMPANY_REPRESENTATIVE_EMAIL'),
            'password' => Hash::make(env('COMPANY_REPRESENTATIVE_PASSWORD')),
            'verified' => 1,
        ]);

        $dbUserRepository = new DbUserRepository();
        $dbUserRepository->assignCompanyRepresentativeRole($companyRepresentative);
        $dbUserRepository->assignAdministratorRole($administrator);
    }
}
