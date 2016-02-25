<?php namespace tests\functional\any\guest\Health;

/**
 * @author Rizart Dokollari
 * @since 12/10/2015
 */
use tests\TestCase;

/**
 * Class HomeTest
 */
class HealthTest extends TestCase
{

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function test_it_reads_contents()
	{
		$this->visit(route('health.info'))
			->seePageIs(route('health.info'))
			->see("<title> " . trans('ahk.info') . " · Chamb.Net</title>");
	}
}
