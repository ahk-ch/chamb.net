<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   17/12/2015
 */
namespace tests\functional\cms\administrator;

use App\Ahk\Repositories\User\DbUserRepository;
use App\Ahk\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use tests\TestCase;

/**
 * Class DashboardTest.
 */
class DashboardTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_reads_dashboard()
    {
        $dbUserRepository = new DbUserRepository();
        $administrator = factory(User::class)->create();
        $dbUserRepository->assignAdministratorRole($administrator);

        $this->actingAs($administrator)
            ->visit(route('cms.dashboard'))
            ->seePageIs(route('cms.dashboard'))
            ->see('<title>Dashboard | CmsChamb</title>');
    }
}
