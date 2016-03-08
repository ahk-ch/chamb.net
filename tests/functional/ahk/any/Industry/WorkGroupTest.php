<?php
/**
 * Created by PhpStorm.
 * User: rdok
 * Date: 06/03/16
 * Time: 14:03
 */

namespace functional\ahk\any\Industry;


use App\Ahk\Article;
use App\Ahk\Industry;
use App\Ahk\Repositories\Article\DbArticleRepository;
use App\Ahk\Repositories\Industry\DbIndustryRepository;
use App\Ahk\Workgroup;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use tests\TestCase;

class WorkGroupTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function it_view_work_groups_index()
	{
		$dbIndustryRepository = new DbIndustryRepository();
		$industry = factory(Industry::class)->create();
		$workGroups = factory(Workgroup::class, 11)->create();
		$workGroupIds = $workGroups->lists('id')->toArray();
		$dbIndustryRepository->assignWorkGroupsById($industry, $workGroupIds);

		$this
			->visit(route('industries.work_groups.index', ['industry_slug' => $industry->slug]))
			->seePageIs(route('industries.work_groups.index', ['industry_slug' => $industry->slug]))
			->see("<title> Work-groups - Health · Chamb.Net</title>")
			->see("<h2>All Work-groups</h2>")
			->see('<span class="results-number">11 result(s)</span>')
			->seeLink($workGroups->get(0)->name,
				route('industries.work_groups.show',
					['industry_slug'   => $industry->slug,
					 'work_group_slug' => $workGroups->get(0)->slug]))
			->see($workGroups->get(1)->description)
			->seeLink($workGroups->get(1)->name,
				route('industries.work_groups.show',
					['industry_slug'   => $industry->slug,
					 'work_group_slug' => $workGroups->get(1)->slug]))
			->seeLink(2,
				route('industries.work_groups.index',
					['industry_slug' => $industry->slug, 'page' => 2]));
	}

	/** @test */
	public function it_view_work_groups_show()
	{
		$dbIndustryRepository = new DbIndustryRepository();
		$dbArticleRepository = new DbArticleRepository();

		$industry = factory(Industry::class)->create();
		$workGroup = factory(Workgroup::class)->create();
		$dbIndustryRepository->assignWorkGroupsById($industry, [$workGroup->id]);
		factory(Article::class, 4)->create();

		$this
			->visit(route('industries.work_groups.show',
				['industry_slug' => $industry->slug, 'work_group_slug' => $workGroup->slug]))
			->seePageIs(route('industries.work_groups.show',
				['industry_slug' => $industry->slug, 'work_group_slug' => $workGroup->slug]))
			->see("<title> $workGroup->name - $industry->name · Chamb.Net</title>")
			->see("<span>Protocols</span>")
			->see("<span>Ideas</span>")
			->see("<span>Decisions</span>")
			->see("<span>Events</span>")
			->see('<h2 class="title-v2 title-center">POPULAR NEWS</h2>');
	}
}