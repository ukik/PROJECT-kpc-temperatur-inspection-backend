<?php

use Illuminate\Database\Eloquent\Model;

class NotificationModel extends Model
{
	use \NotificationSchema;
	use \ViewNotificationSchema;
	
    public $incrementing = false;
    protected $primaryKey = 'id';

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);

		  // origin
		  if (!ifTableExist("notifications")) {
			$this->createStaticTableNotificationSchema("notifications");
		  }

		  // mirror
		  if (!ifViewExist("vw_notifications")) {
			$this->createStaticViewNotificationSchema("vw_notifications");
		  }

		  $this->table = "notifications";		
		
    }

    protected $fillable = [
		'id',
		'type',
		'notifiable_type',
		'notifiable_id',
		'item_id',
		'tag',
		'data',
		'read_at',
		'created_at',
		'updated_at',
    ];

	
}
