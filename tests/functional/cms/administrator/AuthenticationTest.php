<?php
/**
 * @author Rizart Dokollari <r.dokollari@gmail.com>
 * @since  01/04/16
 */
namespace functional\cms\administrator;

use App\Ahk\Repositories\User\DbUserRepository;
use App\Ahk\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Hash;
use tests\TestCase;

class AuthenticationTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_signs_in()
    {
        $dbUserRepository = new DbUserRepository();

        $user = factory(User::class)->create(['password' => Hash::make('some-password'), 'verified' => 1]);
        $dbUserRepository->assignAdministratorRole($user);

        $this->visit(route('cms.sessions.create'))
            ->type($user->email, 'email')
            ->type('some-password', 'password')
            ->press('Sign In')
            ->seePageIs(route('cms.dashboard'))
            ->see('Welcome');
    }
}