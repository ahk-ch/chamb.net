<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   17/12/2015
 */

namespace tests\functional\cms\administrator;

use App\Ahk\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use tests\TestCase;

class DashboardTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function it_reads_dashboard()
	{
		$administrator = factory(User::class)->create();

		$this->actingAs($administrator)
			->visit(route('cms.dashboard'))
			->seePageIs(route('cms.dashboard'))
			->see("Blank");
	}
}