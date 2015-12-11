<?php namespace tests\functional\guest\Health;

/**
 * @author Rizart Dokollari
 * @since 12/10/2015
 */
use tests\TestCase;

/**
 * Class HomeControllerTest
 */
class HealthNewsControllerTest extends TestCase {

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function test_it_reads_contents()
	{
		$this->visit(route('health.news'))
			->seePageIs(route('health.news'))
			->see("<title> " . trans('ahk.news') . "</title>");
	}
}
