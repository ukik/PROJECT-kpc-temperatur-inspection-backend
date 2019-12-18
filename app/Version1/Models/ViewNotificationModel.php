<?php

use Illuminate\Database\Eloquent\Model;

class ViewNotificationModel extends Model
{
	use \NotificationSchema;
	use \ViewNotificationSchema;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);

		  // origin
		  if (!ifTableExist("notifications")) {
			$this->createStaticNotificationSchema("notifications");
		  }

		  // mirror
		  if (!ifViewExist("vw_notifications")) {
			$this->createStaticViewNotificationSchema("vw_notifications");
		  }

		  $this->table = "vw_notifications";		
		
    }

    protected $fillable = [
		'employee',
		'inspection',
    ];

	  protected $casts = [
		'employee'  => 'number',
		'inspection'  => 'number',
	  ];

}
