<?php

/**
 * 
 */
trait NotificationSchema
{
    public function createStaticNotificationSchema($table = "notifications`")
    {

        if(!ifTableExist($table)) {

            sqlExecute("CREATE TABLE `{$table}` 
                (
				  `id` char(40) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
				  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
				  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
				  `notifiable_id` char(40) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT 'refering to who is owner',
				  `item_id` char(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'refering to which data is nofity',
				  `tag` char(1) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '0=new employee, 1=new inspeksi',
				  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
				  `read_at` timestamp NULL DEFAULT NULL,
				  `created_at` timestamp NULL DEFAULT NULL,
				  `updated_at` timestamp NULL DEFAULT NULL,
				  PRIMARY KEY (`id`),
				  KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`)
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1;              
            ");

        }
    }
	
}
