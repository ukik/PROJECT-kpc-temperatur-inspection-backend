<?php

// namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ForgetPasswordUserMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $data;

    public function __construct($payload)
    {
        $this->data = $payload;
    }

    public function build()
    {
        $name = 'KPC Inspector Conveyer';
        $subject = 'Lupa Password';

        return $this->view('mails.forget-password-user-mail')
            ->with('data', $this->data)
            ->with('token', getter('token'))
            ->from(env('MAIL_USERNAME', null), $name)
            ->cc(env('MAIL_USERNAME', null), $name)
            ->bcc(env('MAIL_USERNAME', null), $name)
            ->replyTo(env('MAIL_USERNAME', null), $name)
            ->subject($subject);
    }
}
