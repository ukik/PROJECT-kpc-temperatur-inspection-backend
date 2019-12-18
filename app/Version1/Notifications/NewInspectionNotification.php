<?php

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewInspectionNotification extends Notification
{
    use Queueable;

    protected $data;

    public function __construct($payload)
    {
		setter('tag', '1');
		setter('item_id', $payload->uuid);
        $this->data = $payload;
    }

    public function via($notifiable)
    {
        return [\NotificationChannel::class];
    }

	/*
    public function toArray($notifiable)
    {
        return [
            'title' => "Inspeksi Baru",
            'text'  => "Data baru hasil pengecekan alat conveyer",
            'data'  => $this->data
        ];
    }
	*/

    public function toDatabase($notifiable)
    {
        return [
            'title' => "Inspeksi Baru",
            'text'  => "Data baru hasil pengecekan alat conveyer",
			'tag'	=> "1", // 1 = new inspection
            'data'  => $this->data
        ];
    }
}
