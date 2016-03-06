<?php namespace tests\functional\ahk\any\Industry;

/**
 * @author Rizart Dokollari
 * @since 12/10/2015
 */
use App\Ahk\Company;
use App\Ahk\Industry;
use App\Ahk\Repositories\Industry\DbIndustryRepository;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use tests\TestCase;

/**
 * Class HomeTest
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
		$industry = factory(Industry::class)->create();
		$companies = factory(Company::class, 2)->create(['industry_id' => $industry->id]);

		$this->visit(route('industries.companies.index', ['industry_slug' => $industry->slug]))
			->seePageIs(route('industries.companies.index', ['industry_slug' => $industry->slug]))
			->see("<title> " . trans('ahk.community') . " · Chamb.Net</title>")
			->see(trans('ahk.discover_the_community'))
			->see($companies->get(0)->name)
			->see(route('files.render', ['path' => $companies->get(0)->logo->path ]))
			->see($companies->get(1)->name)
			->see(route('files.render', ['path' => $companies->get(1)->logo->path ]));
	}
}
