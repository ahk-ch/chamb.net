<?php namespace tests\functional\guest;

/**
 * @author Rizart Dokollari
 * @since 12/10/2015
 */
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use tests\TestCase;

/**
 * Class HomeControllerTest
 */
class HomeControllerTest extends TestCase
{
	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function test_it_reads_contents()
	{
		$this->visit(route('home_path'))
			->seePageIs(route('home_path'))
			->see(trans('ahk.welcome'))
			->see('Chamb.Net')
			->see(trans('ahk.we_promote_and_support_bilateral_business_between_greece_and_germany'))
			->see(trans('ahk.news'))
			->see(trans('ahk.community'));
	}
}
