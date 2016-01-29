<?php namespace tests\functional\ahk\guest;

/**
 * @author Rizart Dokollari
 * @since 12/10/2015
 */
use App\AHK\Helpers\Helpers;
use tests\TestCase;

/**
 * Class HomeTest
 */
class LayoutTest extends TestCase
{

	public function test_it_reads_header()
	{
		$this->visit(route('home_path'))
			->see('Languages')
			->see(trans('ahk.login'))
			->see(trans('ahk.register'))
			->see(trans('ahk.home'))
			->see(trans('ahk.health'))
			->see(trans('ahk.community'))
			->see(trans('ahk.about'));
	}

	public function test_it_reads_footer()
	{
		$this->visit(route('home_path'))
			->see(Helpers::autoCopyright('2015'));
	}
}
