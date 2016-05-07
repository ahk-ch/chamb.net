<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   25/11/2015
 */
namespace database\seeds;

use App\Ahk\Repositories\User\DbUserRepository;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        ]);

        $companyRepresentative = $dbUserRepository->store([
            'email'    => env('COMPANY_REPRESENTATIVE_EMAIL'),
            'password' => Hash::make(env('COMPANY_REPRESENTATIVE_PASSWORD')),
        ]);

        $dbUserRepository = new DbUserRepository();
        $dbUserRepository->assignCompanyRepresentativeRole($companyRepresentative);
        $dbUserRepository->assignAdministratorRole($administrator);

        $dbUserRepository->confirmEmail($administrator->token);
        $dbUserRepository->confirmEmail($companyRepresentative->token);
    }
}
