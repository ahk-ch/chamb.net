<?php namespace tests\functional\ahk\any\Health;

/**
 * @author Rizart Dokollari
 * @since 12/10/2015
 */
use Illuminate\Foundation\Testing\DatabaseMigrations;
use tests\TestCase;

/**
 * Class HomeTest
 */
class HealthNewsTest extends TestCase
{

	use DatabaseMigrations;

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function test_it_reads_contents()
	{
		$this->visit(route('health.news'))
			->seePageIs(route('health.news'))
			->see("<title> " . trans('ahk.news') . " &middot; Chamb.Net</title>");
	}
}
