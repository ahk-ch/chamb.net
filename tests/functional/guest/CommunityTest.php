<?php namespace tests\functional\guest;

/**
 * @author Rizart Dokollari
 * @since 12/10/2015
 */
use App\AHK\Industry;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Str;
use tests\TestCase;

/**
 * Class HomeControllerTest
 */
class CommunityTest extends TestCase
{
	use DatabaseMigrations;

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function test_it_reads_contents()
	{
		$industries = factory(Industry::class, 4)->create();

		$this->visit(route('companies_path'))
			->seePageIs(route('companies_path'))
			->see("<title> " . trans('ahk.community') . "</title>")
			->see(trans('ahk.discover_the_community'))
			->see($industries->get(0)->name)
			->see(Str::limit($industries->get(0)->description, 120))
			->see($industries->get(1)->name)
			->see($industries->get(2)->name)
			->see($industries->get(3)->name);
	}
}
