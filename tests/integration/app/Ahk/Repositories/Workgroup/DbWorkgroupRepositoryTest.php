<?php
use App\Ahk\Repositories\User\DbUserRepository;
use App\Ahk\Repositories\Workgroup\DbWorkgroupRepository;
use App\Ahk\User;
use App\Ahk\Workgroup;

/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since 5/7/16
 */
class DbWorkgroupRepositoryTest extends \tests\TestCase
{
    /** @test */
    public function it_stores_workgroup()
    {
        $dbUserRepository = new DbUserRepository();
        $user = factory(User::class)->create();
        $companyRepresentativeUser = $dbUserRepository->assignCompanyRepresentativeRole($user);
        $dbWorkgroupRepository = new DbWorkgroupRepository();
        $workgroupModel = new Workgroup;
        $workgroupFillableKeys = $workgroupModel->getFillable();

        $expectedWorkgroupData = array_only(factory(Workgroup::class, 'relationless')->make()->toArray(), $workgroupFillableKeys);

        $this->dontSeeInDatabase('workgroups', $expectedWorkgroupData);

        $workgroup = $dbWorkgroupRepository->storeAndAssignCreatorByUser($expectedWorkgroupData, $companyRepresentativeUser);

        $this->assertNotFalse($workgroup);

        $this->seeInDatabase('workgroups', $expectedWorkgroupData);
    }
}