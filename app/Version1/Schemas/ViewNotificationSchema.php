<?php

/**
 * 
 */
trait ViewNotificationSchema
{

    public function createStaticViewNotificationSchema($view = "vw_notifications")
    {

        if (!ifViewExist($view)) {

            sqlExecute("CREATE VIEW `{$view}` AS 
				SELECT
				  COUNT(CASE
					WHEN `notifications`.`tag` = '0'
					THEN 1
				  END) AS `employee`,
				  COUNT(CASE
					WHEN `notifications`.`tag` = '1'
					THEN 1
				  END) AS `inspection`
				FROM
				  `notifications`
            ");
        }
    }
}
