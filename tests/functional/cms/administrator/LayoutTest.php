<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   17/12/2015
 */

namespace tests\functional\cms\administrator;

use App\AHK\User;
use tests\TestCase;

class LayoutTest extends TestCase
{

	/** @test */
	public function it_reads_sidebar()
	{
		$administrator = factory(User::class)->create();


		$this->actingAs($administrator)
			->visit(route('cms.dashboard'))
			->see('<li class="header">' . trans('cms.main_navigation') . '</li>')
			->see('<span>' . trans('cms.users') . '</span>')
			->see('<i class="fa fa-users"></i> ' . trans('cms.subscribers'))
			->see('<i class="fa fa-users"></i> ' . trans('cms.administrators'))
			->see('<i class="fa fa-newspaper-o"></i> <span>' . trans('cms.articles'))
			->see('<i class="fa fa-list"></i> ' . trans('cms.published'))
			->see('<i class="fa fa-archive"></i> ' . trans('cms.unpublished'))
			->see('<i class="fa fa-plus"></i> ' . trans('cms.create'))
			->see('<i class="fa fa-puzzle-piece"></i> ' . trans('cms.categories'))
			->see('<i class="fa fa-tags"></i> ' . trans('cms.tags'));
	}
}