<?php
/**
 * @author Rizart Dokollari
 * @since  2/2/2016
 */
namespace tests\functional\ahk\guest;

use App\Ahk\Repositories\User\DbUserRepository;
use App\Ahk\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use tests\TestCase;

/**
 * Class RegistrationTest.
 */
class RegistrationTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_access_registration_in_page()
    {
        $this->visit(route('home_path'))
            ->click(trans('ahk.register'))
            ->seePageIs(route('auth.register'));

        $this->visit(route('auth.register'))
            ->seePageIs(route('auth.register'));
    }

    /** @test */
    public function it_reads_register_page_view()
    {
        $this->visit(route('auth.register'))
            ->see('<title> '.trans('ahk.register').' · Chamb.Net</title>')
            ->see('<h2>'.trans('ahk.register').'</h2>')
            ->see('<a href="'.route('auth.sign_in').'" class="color-green">'.trans('ahk.sign_in').'</a>')
            ->see('<i class="fa fa-envelope"></i>')
            ->see('<input class="form-control" placeholder="Email" required="required" name="email" type="email">')
            ->see('<i class="fa fa-key"></i>')
            ->see('<i class="fa fa-lock"></i>')
            ->see('<input class="form-control" placeholder="'.trans('ahk.password').'" required="required" name="password" type="password" value="">')
            ->see('<input class="form-control" placeholder="'.trans('ahk.password_confirmation').'" required="required" name="password_confirmation" type="password" value="">')
            ->see(trans('ahk.i_agree_to_the'))
            ->see(route('terms_of_use_path'))
            ->see('<button class="btn-u" type="submit">'.trans('ahk.register').'</button>')
            ->see('<a href="'.route('auth.sign_in').'" class="color-green">'.trans('ahk.sign_in').'</a>');
    }

    /** @test */
    public function it_registers_company_representative_account()
    {
        $this->visit(route('auth.register'))
            ->type('r.dokollari@email.com', 'email')
            ->type('some-password', 'password')
            ->type('some-password', 'password_confirmation')
            ->check('agree_to_terms')
            ->press(trans('ahk.register'))
            ->seePageIs(route('auth.sign_in'))
            ->see(trans('ahk_messages.check_your_email_and_complete_registration'));
    }

    /** @test */
    public function it_verifies_company_representative_account()
    {
        $user = factory(User::class)->create();

        $this->visit(route('auth.register.confirm', ['token' => $user->token]))
            ->seePageIs(route('home_path'))
            ->see(trans('ahk_messages.successful_sign_up'));
    }

    /** @test */
    public function it_recovers_an_account()
    {
        $dbUserRepository = new DbUserRepository();

        $user = factory(User::class)->create();
        $dbUserRepository->assignCompanyRepresentativeRole($user);

        $this->visit(route('auth.sign_in'))
            ->click(trans('ahk.forgot_your_password'))
            ->seePageIs(route('auth.recover.get'))
            ->see('<title> '.trans('ahk.reset_password').' · Chamb.Net</title>')
            ->type($user->email, 'email')
            ->press(trans('ahk.send_password_reset_link'))
            ->see(trans('ahk_messages.check_your_email_to_recover_account'));

        $user = factory(User::class)->create();
        $dbUserRepository->assignCompanyRepresentativeRole($user);
        $dbUserRepository->generateRecoveryToken($user);

        $this->visit(route('auth.recover.reset', ['slug' => $user->slug, 'recovery_token' => $user->recovery_token]))
            ->seePageIs(route('auth.recover.reset', ['slug' => $user->slug, 'recovery_token' => $user->recovery_token]))
            ->see('<title> '.trans('ahk.reset_password').' · Chamb.Net</title>')
            ->type('new-password', 'password')
            ->type('new-password', 'password_confirmation')
            ->press(trans('ahk.reset_password'))
            ->seePageIs(route('auth.sign_in'))
            ->see(trans('ahk_messages.you_updated_your_accounts_password'));
    }
}
