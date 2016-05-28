<?php
use App\Ahk\Repositories\User\DbUserRepository;
use App\Ahk\Repositories\Workgroup\DbWorkgroupRepository;
use App\Ahk\User;
use App\Ahk\Workgroup;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 5/7/16
 */
class DbWorkgroupRepositoryTest extends \tests\TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function store_a_workgroup()
    {
        $companyRepresentativeUser = $this->createCompanyRepresentativeUser();
        $dbWorkgroupRepository = new DbWorkgroupRepository();
        $workgroupModel = new Workgroup;
        $workgroupFillableKeys = $workgroupModel->getFillable();

        $expectedWorkgroupData = array_only(factory(Workgroup::class, 'relationless')->make()->toArray(),
            $workgroupFillableKeys);

        $this->dontSeeInDatabase('workgroups', $expectedWorkgroupData);

        $workgroup = $dbWorkgroupRepository->storeAndAssignCreatorByUser($expectedWorkgroupData,
            $companyRepresentativeUser);

        $this->assertNotFalse($workgroup);

        $this->seeInDatabase('workgroups', $expectedWorkgroupData);
    }

    /**
     * @return User|bool
     */
    private function createCompanyRepresentativeUser()
    {
        $dbUserRepository = new DbUserRepository();
        $user = factory(User::class)->create();
        $companyRepresentativeUser = $dbUserRepository->assignCompanyRepresentativeRole($user);

        return $companyRepresentativeUser;
    }

    /** @test */
    public function find_a_workgroup_by_name()
    {
        $dbWorkgroupRepository = new DbWorkgroupRepository();

        $workgroup = factory(Workgroup::class)->create();

        $this->assertSame($workgroup->name, $dbWorkgroupRepository->findByName($workgroup->name)->name);
    }
}
