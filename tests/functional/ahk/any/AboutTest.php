<?php namespace tests\functional\ahk\any;

/**
 * @author Rizart Dokollari
 * @since 12/10/2015
 */
use tests\TestCase;

/**
 * Class HomeTest
 */
class AboutTest extends TestCase
{

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function test_it_reads_contents()
	{
		$this->visit(route('about_path'))
			->seePageIs(route('about_path'))
			->see("<title> " . trans('ahk.about') . " &middot; Chamb.Net</title>");
	}
}