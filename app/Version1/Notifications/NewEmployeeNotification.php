<?php

// namespace App\Version1\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewEmployeeNotification extends Notification
{
    use Queueable;

    protected $data;

    public function __construct($payload)
    {
		setter('tag', '0');
		setter('item_id', $payload->uuid);
        $this->data = $payload;
    }

    public function via($notifiable)
    {
        //return ['mail', 'database'];
		return [\NotificationChannel::class, 'mail'];
    }

    public function toMail($notifiable)
    {

        try {
			// email dari controller
            //\Mail::to(env('MAIL_USERNAME', null))->send(new \NewRegisterAdminMail($this->data));
            //\Mail::to($this->data->email_employee)->send(new \NewRegisterUserMail($this->data));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => "Karyawan Baru",
            'text'  => "Selamat bergabung di aplikasi KPC Conveyer Inspector",
			'tag'	=> "0", // 0 = new inspection
            'data'  => $this->data
        ];
    }
}
