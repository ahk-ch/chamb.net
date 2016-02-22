<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   25/11/2015
 */

namespace database\seeds;


use App\Ahk\Repositories\User\DbUserRepository;
use App\Ahk\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

		factory(User::class)->create([
			'email'    => env('ADMIN_EMAIL'),
			'password' => Hash::make(env('ADMIN_PASSWORD')),
			'verified' => 1,
		]);


		$companyRepresentative = factory(User::class)->create([
			'email'     => env('COMPANY_REPRESENTATIVE_EMAIL'),
			'password' => Hash::make(env('COMPANY_REPRESENTATIVE_PASSWORD')),
			'verified' => 1
		]);

		$dbUserRepository->assignCompanyRepresentativeRole($companyRepresentative);
	}
}