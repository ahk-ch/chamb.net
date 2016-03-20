<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   10/2/2016
 */
namespace App\Ahk\Notifications;

use App\Ahk\User;
use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;

/**
 * Class AppMailer.
 */
class AppMailer
{
    /**
     * @var Mailer
     */
    protected $mailer;
    /**
     * @var
     */
    protected $view;
    /**
     * @var string
     */
    protected $fromEmail = 'no-reply@chamb.net';
    /**
     * @var string
     */
    protected $fromName = 'Chamb.Net Web Services';
    /**
     * @var
     */
    protected $to;
    /**
     * @var string
     */
    protected $subject = 'System Message';
    /**
     * @var array
     */
    protected $data = [];

    /**
     * AppMailer constructor.
     *
     * @param Mailer $mailer
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * @param User $user
     *
     * @return bool
     */
    public function sendEmailConfirmation(User $user)
    {
        $this->to = $user->email;
        $this->view = 'ahk.emails.confirm';
        $this->data = compact('user');
        $this->subject = trans('ahk.verify_email');

        $this->deliver();

        return true;
    }

    private function deliver()
    {
        $this->mailer->send($this->view, $this->data, function (Message $message) {
            $message->from($this->fromEmail, $this->fromName)
                ->subject($this->subject)
                ->to($this->to);
        });
    }

    /**
     * @param User $user
     *
     * @return bool
     */
    public function sendRecoveryEmail(User $user)
    {
        $this->to = $user->email;

        $this->view = 'ahk.emails.reset_password';

        $this->data = compact('user');

        $this->subject = trans('ahk.reset_password');

        $this->deliver();

        return true;
    }
}

