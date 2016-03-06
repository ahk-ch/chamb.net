<?php
/**
 * Created by PhpStorm.
 * User: rdok
 * Date: 06/03/16
 * Time: 14:03
 */

namespace functional\ahk\any\Industry;


use App\Ahk\Company;
use App\Ahk\Industry;
use App\Ahk\Workgroup;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use tests\TestCase;

class WorkGroupTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function it_view_work_groups_index()
	{
		// i have two workgroups for an industry
		$industry = factory(Industry::class)->create();
		$workGroups = factory(Workgroup::class, 13)->create();
		$workGroupIds = array_only($workGroups->toArray(), 'id');
		$industry->workgroups()->sync($workGroupIds);

		// I visit an industry workgroup list
		$this
			->visit(route('industries.work_groups', ['industry_slug' => $industry->slug]))
			->seePageIs(route('industries.work_groups', ['industry_slug' => $industry->slug]))
			->see("<title> Work-groups - Health · Chamb.Net</title>")
			->see("<h2>Search Work-groups</h2>")
			->see('<span class="results-number">2 results</span>')
			// i see first workgroup title
			->see(route('industries.work_groups.show',
				['industry_slug' => $industry->slug, 'work_group' => $workGroups->get(0)->slug]))
			// i see first workgroup description
			->see($workGroups->get(0)->description)
			// i see second workgroup title
			->see(route('industries.work_groups.show',
				['industry_slug' => $industry->slug, 'work_group' => $workGroups->get(1)->slug]))
			// i see second workgroup description
			->see($workGroups->get(1)->description);


		// i see pagination
	}

}