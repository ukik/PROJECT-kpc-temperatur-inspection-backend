<?php

use Illuminate\Notifications\Notification;

class NotificationChannel
{

  public function send($notifiable, Notification $notification)
  {
    $data = $notification->toDatabase($notifiable);

    return $notifiable->routeNotificationFor('database')->create([
        'id' 		=> $notification->id,

        //customize here
        'tag' 		=> $data['tag'], //getter('tag'), //$data['tag'] //<-- comes from toDatabase()
		'item_id'	=> getter('item_id'),

        'type' 		=> get_class($notification),
        'data' 		=> $data,
        'read_at' 	=> null,
    ]);
  }

}