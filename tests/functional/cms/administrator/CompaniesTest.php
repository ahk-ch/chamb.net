<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   17/12/2015
 */
namespace tests\functional\cms\administrator;

use App\Ahk\Company;
use App\Ahk\Repositories\User\DbUserRepository;
use App\Ahk\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use tests\TestCase;

/**
 * Class CompaniesTest.
 */
class CompaniesTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_reads_companies_index()
    {
        $dbUserRepository = new DbUserRepository();
        $administrator = factory(User::class)->create();
        $companies = factory(Company::class, 2)->create();

        $this->actingAs($administrator)
            ->visit(route('cms.companies.index'))
            ->seePageIs(route('cms.sessions.create'))
            ->see(trans('cms.missing_required_role'));

        $dbUserRepository->assignAdministratorRole($administrator);

        $this->actingAs($administrator)
            ->visit(route('cms.companies.index'))
            ->seePageIs(route('cms.companies.index'))
            ->see('<title>'.trans('cms.companies').' | '.'CmsChamb</title>')
            ->see('<h3 class="box-title">'.trans('cms.table').'</h3>')
            ->see('<th>'.trans('cms.name').'</th>')
            ->see('<th>'.trans('cms.logo').'</th>')
            ->see('<th>'.trans('cms.name_of_contact_partner').'</th>')
            ->see($companies->get(0)->name)
            ->see($companies->get(0)->logo->path)
            ->see($companies->get(0)->name_of_contact_partner)
            ->see($companies->get(1)->name)
            ->see($companies->get(1)->logo->path)
            ->see($companies->get(1)->name_of_contact_partner);
    }
}
