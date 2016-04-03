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
    public function it_can_login()
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

    /** @test */
    public function it_restricts_not_validated()
    {
        $dbUserRepository = new DbUserRepository();

        $user = factory(User::class)->create(['password' => Hash::make('some-password'), 'verified' => 0]);
        $dbUserRepository->assignAdministratorRole($user);

        $this->visit(route('cms.sessions.create'))
            ->type($user->email, 'email')
            ->type('some-password', 'password')
            ->press('Sign In')
            ->seePageIs(route('cms.sessions.create'))
            ->see(trans('ahk_messages.please_validate_your_email_first'));
    }
}
