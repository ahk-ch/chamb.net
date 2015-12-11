<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   11/12/2015
 */

namespace tests\unit\AHK\Helpers;

use App\AHK\Helpers\Helpers;
use tests\TestCase;

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