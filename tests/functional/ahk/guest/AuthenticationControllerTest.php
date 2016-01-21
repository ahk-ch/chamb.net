<?php namespace tests\functional\ahk\guest;

/**
 * @author Rizart Dokollari
 * @since 12/10/2015
 */
use tests\TestCase;

/**
 * Class HomeControllerTest
 */
class AuthenticationControllerTest extends TestCase
{
	/** @test */
	public function it_reads_sign_in_page()
	{
		$this->visit(route('home_path'))
			->seePageIs(route('home_path'))
			->see('<label class="image-replace cd-email" for="sign_in_email">E-mail</label>')
			->see('<input class="full-width has-padding has-border " placeholder="E-mail" name="email" type="email">')
			->see('<label class="image-replace cd-password" for="signin-password">' . trans('ahk.password') . '</label>')
			->see('<input class="full-width has-padding has-border " placeholder="' . trans('ahk.password') . '" name="password" type="text">')
			->see(trans('ahk.hide'))
			->see(trans('ahk.remember_me'))
			->see(trans('ahk.login'));
	}

	/** @test */
	public function it_signs_in()
	{


	}
}
