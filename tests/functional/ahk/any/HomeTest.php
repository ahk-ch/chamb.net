<?php namespace tests\functional\ahk\any;

/**
 * @author Rizart Dokollari
 * @since 12/10/2015
 */
use tests\TestCase;

/**
 * Class HomeTest
 */
class HomeTest extends TestCase
{
	/** @test */
	public function test_it_reads_contents()
	{
		$this->visit(route('home_path'))
			->seePageIs(route('home_path'))
			->see(trans('ahk.home') . ' · Chamb.Net')
			->see(trans('ahk.we_promote_and_support_bilateral_business_between_greece_and_germany'));
	}
}
