<?php namespace tests\functional\ahk\guest;

/**
 * @author Rizart Dokollari
 * @since 12/10/2015
 */
use App\AHK\Repositories\User\DbUserRepository;
use App\AHK\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Hash;
use tests\TestCase;

/**
 * Class HomeTest
 */
class AuthenticationTest extends TestCase
{
	use DatabaseMigrations;

	protected $dbUserRepository;

	public function setUp()
	{
		parent::setUp();

		$this->dbUserRepository = new DbUserRepository();
	}


	/** @test */
	public function it_access_sign_in_page()
	{
		$this->visit(route('home_path'))
			->click(trans('ahk.sign_in'))
			->seePageIs(route('auth.sign_in'));

		$this->visit(route('auth.sign_in'))
			->seePageIs(route('auth.sign_in'));
	}

	/** @test */
	public function it_reads_sign_in_page()
	{
		$this->visit(route('auth.sign_in'))
			->see('<title> ' . trans('ahk.sign_in') . ' | Chamb.Net</title>')
			->see('<h2>' . trans('ahk.sign_in') . '</h2>')
			->see('<i class="fa fa-user"></i>')
			->see('<input type="text" placeholder="' . trans('ahk.username') . '" class="form-control">')
			->see('<i class="fa fa-lock"></i>')
			->see('<input type="password" placeholder="' . trans('ahk.password') . '" class="form-control">')
			->see('<label><input type="checkbox"> ' . trans('ahk.remember_me') . '</label>')
			->see('<button class="btn-u pull-right" type="submit">' . trans('ahk.sign_in') . '</button>')
			->see('<h4>' . trans('ahk.forgot_your_password') . '</h4>');
	}

	/** @test */
	public function it_signs_in()
	{
		$user = factory(User::class)
			->create(['email' => 'email@email.com', 'password' => Hash::make('some-password')]);
		$this->dbUserRepository->assignCompanyRepresentativeRole($user);

		$this->visit(route('auth.sign_in'));
	}

}
