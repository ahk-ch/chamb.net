<?php
/**
 * @author Rizart Dokollari
 * @since  12/10/2015
 */
namespace tests\functional\ahk\any\Industry;

use App\Ahk\Industry;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use tests\TestCase;

/**
 * Class HomeTest.
 */
class InfoTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function test_it_reads_contents()
    {
        $industry = factory(Industry::class)->create();

        $this->visit(route('industries.info', ['industry_slug' => $industry->slug]))
            ->seePageIs(route('industries.info', ['industry_slug' => $industry->slug]))
            ->see('<title> '.trans('ahk.info').' · Chamb.Net</title>');
    }
}
