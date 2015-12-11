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
class LayoutControllerTest extends TestCase
{
	public function test_it_reads_header()
	{
		$this->visit(route('home_path'))
			->see('Languages')
			->see(trans('ahk.login'))
			->see(trans('ahk.home'))
			->see(trans('ahk.health'))
			->see(trans('ahk.community'))
			->see(trans('ahk.about'));
	}

	public function test_it_reads_footer()
	{
		$this->visit(route('home_path'));
	}
}
