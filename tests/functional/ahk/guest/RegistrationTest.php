<?php namespace tests\functional\ahk\guest;

/**
 * @author Rizart Dokollari
 * @since 2/2/2016
 */
use tests\TestCase;

/**
 * Class HomeTest
 */
class RegistrationTest extends TestCase
{
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
			->see('<input type="email" placeholder="Email" class="form-control">')
			->see('<i class="fa fa-key"></i>')
			->see('<i class="fa fa-lock"></i>')
			->see('<input type="password" placeholder="' . trans('ahk.password') . '" class="form-control">')
			->see('<input type="password" placeholder="' . trans('ahk.confirm_password') . '" class="form-control">')
			->see(trans('ahk.i_agree_to_the'))
			->see(route('terms_of_use_path'))
			->see('<button class="btn-u" type="submit">' . trans('ahk.register') . '</button>')
			->see('<a href="' . route('auth.sign_in') . '" class="color-green">' . trans('ahk.sign_in') . '</a>');
	}

	/** @test */
	public function it_registers_company_representative_account()
	{
		$this->visit(route('auth.register'))
			->type('text@email.com', 'email')
			->type('some-password', 'password')
			->press(trans('ahk.register'))
			->seePageIs(route('auth.sign_in'))
			->see(trans('ahk_messages.check_your_email_and_complete_registration'));
	}
}
