<?php namespace tests\functional\ahk\guest;

/**
 * @author Rizart Dokollari
 * @since 2/2/2016
 */
use App\Ahk\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use tests\TestCase;

/**
 * Class HomeTest
 */
class RegistrationTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function it_access_registration_in_page()
	{
		$this->visit(route('home_path'))
			->click(trans('ahk.register'))
			->seePageIs(route('auth.register'));

		$this->visit(route('auth.register'))
			->seePageIs(route('auth.register'));
	}

	/** @test */
	public function it_reads_register_page_view()
	{
		$this->visit(route('auth.register'))
			->see('<title> ' . trans('ahk.register') . ' &middot; Chamb.Net</title>')
			->see('<h2>' . trans('ahk.register') . '</h2>')
			->see('<a href="' . route('auth.sign_in') . '" class="color-green">' . trans('ahk.sign_in') . '</a>')
			->see('<i class="fa fa-envelope"></i>')
			->see('<input class="form-control" placeholder="Email" required="required" name="email" type="email">')
			->see('<i class="fa fa-key"></i>')
			->see('<i class="fa fa-lock"></i>')
			->see('<input class="form-control" placeholder="' . trans('ahk.password') . '" required="required" name="password" type="password" value="">')
			->see('<input class="form-control" placeholder="' . trans('ahk.password_confirmation') . '" required="required" name="password_confirmation" type="password" value="">')
			->see(trans('ahk.i_agree_to_the'))
			->see(route('terms_of_use_path'))
			->see('<button class="btn-u" type="submit">' . trans('ahk.register') . '</button>')
			->see('<a href="' . route('auth.sign_in') . '" class="color-green">' . trans('ahk.sign_in') . '</a>');
	}

	/** @test */
	public function it_registers_company_representative_account()
	{
		$this->visit(route('auth.register'))
			->type('name@domain.com', 'email')
			->type('some-password', 'password')
			->type('some-password', 'password_confirmation')
			->check('agree_to_terms')
			->press(trans('ahk.register'))
			->seePageIs(route('auth.sign_in'))
			->see(trans('ahk_messages.check_your_email_and_complete_registration'));
	}

	/** @test */
	public function it_verifies_company_representative_account()
	{
		$user = factory(User::class)->create();

		$this->visit(route('auth.register.confirm', ['token' => $user->token]))
			->seePageIs(route('home_path'))
			->see(trans('ahk.successful_sign_up'));
	}
}
