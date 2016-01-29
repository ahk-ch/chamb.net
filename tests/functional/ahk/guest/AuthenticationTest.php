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
			->click(trans('ahk.login'))
			->seePageIs(route('auth.login'));

		$this->visit(route('auth.login'))
			->seePageIs(route('auth.login'));
	}

	/** @test */
	public function it_reads_sign_in_page()
	{
		$this->visit(route('auth.login'))
			->see('<title> ' . trans('ahk.login') . ' | Chamb.Net</title>')
			->see(trans('ahk.login_to_your_account'))
			->see('<i class="fa fa-user"></i>')
			->see('<input type="text" placeholder="' . trans('ahk.username') . '" class="form-control">')
			->see('<i class="fa fa-lock"></i>')
			->see('<input type="password" placeholder="' . trans('ahk.password') . '" class="form-control">')
			->see('<label><input type="checkbox"> ' . trans('ahk.remember_me') . '</label>')
			->see('<button class="btn-u pull-right" type="submit">' . trans('ahk.login') . '</button>')
			->see('<h4>' . trans('ahk.forgot_your_password') . '</h4>');
	}

	/** @test */
	public function it_registers_company_representative_account()
	{
		$this->visit(route('home_path'))
			->seePageIs(route('home_path'))
			->click(trans('ahk.login'))
			->seePageIs(route('home_path'))
			->click(trans('ahk.register'))
			->type('dummy@email.com', 'email')
			->type('some-password', 'password')
			->check('accept-terms')
			->press(trans('ahk.create_account'));
	}
}
