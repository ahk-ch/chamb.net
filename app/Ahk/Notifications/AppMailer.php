<?php

/**
 * @author  Rizart Dokollari <r.dokollari@gmail.com>
 * @since   10/2/2016
 */

namespace App\Ahk\Notifications;

use App\Ahk\User;
use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;

class AppMailer
{
    protected $mailer;
    protected $view;
    protected $fromEmail = "no-reply@chamb.net";
    protected $fromName = "Chamb.Net Web Services";
    protected $to;
    protected $subject = "System Message";
    protected $data = [];

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendEmailConfirmation(User $user)
    {
        $this->to = $user->email;
        $this->view = "ahk.emails.confirm";
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

    public function sendRecoveryEmail(User $user)
    {
        $this->to = $user->email;

        $this->view = "ahk.emails.reset_password";

        $this->data = compact('user');

        $this->subject = trans('ahk.reset_password');

        $this->deliver();

        return true;
    }
}
