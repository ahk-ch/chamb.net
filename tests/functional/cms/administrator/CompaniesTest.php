<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   17/12/2015
 */

namespace tests\functional\cms\administrator;

use App\AHK\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use tests\TestCase;

class CompaniesTest extends TestCase
{
	use DatabaseMigrations;

	/** @test */
	public function it_reads_companies_index()
	{
		$administrator = factory(User::class)->create();

		$this->actingAs($administrator)
			->visit(route('cms.companies.index'))
			->seePageIs(route('cms.companies.index'))
			->see('<title>' . trans('cms.companies') . ' | ' . 'CmsChamb</title>')
			->see(trans('cms.name'))
			->see(trans('cms.logo'))
			->see(trans('cms.name_of_contact_partner'));
	}
}
