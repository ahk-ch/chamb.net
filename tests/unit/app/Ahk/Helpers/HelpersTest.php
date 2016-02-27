<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   11/12/2015
 */

namespace tests\unit\Ahk\Helpers;

use App\Ahk\Helpers\Helpers;
use tests\TestCase;

/**
 * Class HelpersTest
 * @package tests\unit\Ahk\Helpers
 */
class HelpersTest extends TestCase {

	/**
	 * @test
	 */
	public function it_returns_correct_copyright_dates()
	{
		$this->assertSame(date('Y'), Helpers::autoCopyright());

		$this->assertSame(date('Y'), Helpers::autoCopyright(date('Y')));

		$this->assertSame("2010 - " . date('Y'), Helpers::autoCopyright('2010'));

		$this->assertSame(date('Y'), Helpers::autoCopyright('10000'));
	}
}