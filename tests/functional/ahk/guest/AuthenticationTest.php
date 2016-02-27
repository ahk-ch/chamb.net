<?php namespace tests\functional\ahk\guest;

/**
 * @author Rizart Dokollari
 * @since 12/10/2015
 */
use App\Ahk\Repositories\User\DbUserRepository;
use App\Ahk\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Hash;
use tests\TestCase;

/**
 * Class HomeTest
 */
class AuthenticationTest extends TestCase
{
	use DatabaseMigrations;

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
			->see('<title> ' . trans('ahk.sign_in') . ' · Chamb.Net</title>')
			->see('<h2>' . trans('ahk.sign_in') . '</h2>')
			->see('<i class="fa fa-envelope"></i>')
			->see('<input class="form-control" placeholder="Email" required="required" name="email" type="email">')
			->see('<i class="fa fa-lock"></i>')
			->see('<input class="form-control" placeholder="' . trans("ahk.password") . '" required="required" name="password" type="password" value="">')
			->see('<input name="remember_me" type="checkbox" value="1"> ' . trans('ahk.remember_me'))
			->see('<input class="btn-u pull-right" id="sign-in" name="sign-in" type="submit" value="Sign In">')
			->see('<a href="' . route('auth.recover.get') . '">' . trans('ahk.forgot_your_password') . '</a>');
	}

	/** @test */
	public function it_signs_in()
	{
		$dbUserRepository = new DbUserRepository();

		$user = factory(User::class)
			->create(['email' => 'email@email.com', 'password' => Hash::make('some-password'), 'verified' => 1]);

		$dbUserRepository->assignCompanyRepresentativeRole($user);

		$this->visit(route('auth.sign_in'))
			->type($user->email, 'email')
			->type('some-password', 'password')
			->press(trans('ahk.sign_in'))
			->seePageIs(route('home_path'))
			->see(trans('ahk_messages.successful_sign_in'));
	}

	/** @test */
	public function it_shows_credentials_mismatch_error()
	{
		$dbUserRepository = new DbUserRepository();
		$user = factory(User::class)
			->create(['email' => 'email@email.com', 'password' => Hash::make('some-password'), 'verified' => 1]);
		$dbUserRepository->assignCompanyRepresentativeRole($user);

		$this->visit(route('auth.sign_in'))
			->type($user->email, 'email')
			->type('wrong-password', 'password')
			->press(trans('ahk.sign_in'))
			->seePageIs(route('auth.sign_in'))
			->see(trans('ahk_messages.credentials_mismatch'));
	}

	/** @test */
	public function it_shows_invalidated_account_error()
	{
		$dbUserRepository = new DbUserRepository();
		$user = factory(User::class)
			->create(['email'    => 'email@email.com', 'password' => Hash::make('some-password'), 'verified' => 0]);
		$dbUserRepository->assignCompanyRepresentativeRole($user);

		$this->visit(route('auth.sign_in'))
			->type($user->email, 'email')
			->type('some-password', 'password')
			->press(trans('ahk.sign_in'))
			->seePageIs(route('auth.sign_in'))
			->see(trans('ahk_messages.please_validate_your_email_first'));
	}

	/** @test */
	public function it_shows_missing_privileges_error()
	{
		$user = factory(User::class)
			->create(['email'    => 'email@email.com', 'password' => Hash::make('some-password'), 'verified' => 1]);

		$this->visit(route('auth.sign_in'))
			->type($user->email, 'email')
			->type('some-password', 'password')
			->press(trans('ahk.sign_in'))
			->seePageIs(route('auth.sign_in'))
			->see(trans('ahk_messages.you_do_not_have_the_necessary_privileges'));
	}
}
