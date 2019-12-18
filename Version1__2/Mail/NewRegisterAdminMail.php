<?php

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewRegisterAdminMail extends Mailable
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
        $subject = 'Karyawan Baru';

        return $this->view('mails.new-register-admin-mail')
            ->with('data', $this->data)
            ->from(env('MAIL_USERNAME', null), $name)
            ->cc(env('MAIL_USERNAME', null), $name)
            ->bcc(env('MAIL_USERNAME', null), $name)
            ->replyTo(env('MAIL_USERNAME', null), $name)
            ->subject($subject);
    }
}
