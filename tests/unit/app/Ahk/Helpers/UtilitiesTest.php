<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   11/12/2015
 */
namespace tests\unit\Ahk\Helpers;

use App\Ahk\Helpers\Utilities;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use tests\TestCase;

/**
 * Class UtilitiesTest.
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

        $this->assertSame(date('Y').' - 3000', $utilities->autoCopyright('3000'));

        $this->assertSame('1000 - '.date('Y'), $utilities->autoCopyright('1000'));
    }
}
