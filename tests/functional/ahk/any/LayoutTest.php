<?php
/**
 * @author Rizart Dokollari
 * @since  12/10/2015
 */
namespace tests\functional\ahk\any;

use App\Ahk\Helpers\Utilities;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use tests\TestCase;

/**
 * Class HomeTest.
 */
class LayoutTest extends TestCase
{
    use DatabaseTransactions;

    public function test_it_reads_header()
    {
        $this->visit(route('home_path'))
            ->see('Languages')
            ->see(trans('ahk.sign_in'))
            ->see(trans('ahk.register'))
            ->see(trans('ahk.home'))
            ->see(trans('ahk.health'))
            ->see(trans('ahk.about'));
    }

    public function test_it_reads_footer()
    {
        $utilities = new Utilities();

        $this->visit(route('home_path'))
            ->see($utilities->autoCopyright('2015'));
    }
}
