<?php namespace tests\functional\guest;

/**
 * @author Rizart Dokollari
 * @since 12/10/2015
 */
use tests\TestCase;

/**
 * Class HomeControllerTest
 */
class CommunityControllerTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function test_it_reads_contents()
	{
		$this->visit(route('companies_path'))
			->seePageIs(route('companies_path'))
			->see("<title> " . trans('ahk.community') . "</title>")
			->see(trans('ahk.discover_the_community'));
	}
}
