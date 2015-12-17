<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   17/12/2015
 */

namespace tests\functional\cms\guest;

use tests\TestCase;

class DashboardTest extends TestCase
{
	/** @test */
	public function it_denies_access()
	{
		$this->visit(route('cms.dashboard'))
			->seePageIs(route('cms.sessions.create'))
			->see(trans('cms.you_need_to_login_first'));
	}
}