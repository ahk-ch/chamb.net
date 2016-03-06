<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   11/12/2015
 */

namespace tests\unit\Ahk\Helpers;

use App\Ahk\Helpers\Utilities;
use App\Ahk\Industry;
use App\Ahk\Repositories\Industry\DbIndustryRepository;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Routing\Route;
use tests\TestCase;

/**
 * Class HelpersTest
 * @package tests\unit\Ahk\Helpers
 */
class UtilitiesTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function it_returns_correct_copyright_dates()
	{
		$utilities = new Utilities();

		$this->assertSame(date('Y'), $utilities->autoCopyright());

		$this->assertSame(date('Y'), $utilities->autoCopyright(date('Y')));

		$this->assertSame("2010 - " . date('Y'), $utilities->autoCopyright('2010'));

		$this->assertSame(date('Y'), $utilities->autoCopyright('10000'));
	}
}