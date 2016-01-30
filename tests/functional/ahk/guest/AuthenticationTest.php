<?php namespace tests\functional\ahk\guest;

/**
 * @author Rizart Dokollari
 * @since 12/10/2015
 */
use tests\TestCase;

/**
 * Class HomeTest
 */
class AuthenticationTest extends TestCase
{
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
			->see('<title> ' . trans('ahk.register') . ' | Chamb.Net</title>')
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
			->see('<button class="btn-u" type="submit">' . trans('ahk.register') . '</button>');
	}
}
