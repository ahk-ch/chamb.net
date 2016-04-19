<?php
/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   17/12/2015
 */
namespace tests\functional\cms\administrator;

use App\Ahk\Company;
use App\Ahk\Repositories\User\DbUserRepository;
use App\Ahk\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use tests\TestCase;

/**
 * Class CompaniesTest.
 */
class CompaniesTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_reads_companies_index()
    {
        $dbUserRepository = new DbUserRepository();
        $administrator = factory(User::class)->create(['verified' => true]);
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
            ->see(route('files.render', ['path' => $companies->get(0)->logo->path]))
            ->see($companies->get(0)->business_leader)
            ->see($companies->get(1)->name)
            ->see(route('files.render', ['path' => $companies->get(1)->logo->path]))
            ->see($companies->get(1)->business_leader);
    }

    /** @test */
    public function it_access_company_edit_page()
    {
        $dbUserRepository = new DbUserRepository();
        $administrator = factory(User::class)->create(['verified' => true]);
        $dbUserRepository->assignAdministratorRole($administrator);
        $company = factory(Company::class)->create();

        $this->actingAs($administrator)
            ->visit(route('cms.companies.edit', $company))
            ->seePageIs(route('cms.companies.edit', $company));

        $this->actingAs($administrator)
            ->visit(route('cms.companies.index'))
            ->click(route('cms.companies.edit', $company))
            ->seePageIs(route('cms.companies.edit', $company->slug));
    }
}
