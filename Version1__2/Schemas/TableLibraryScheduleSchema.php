<?php

/**
 * 
 */
trait TableLibraryScheduleSchema
{
    public function createStaticTableLibraryScheduleSchema($table = "tb_library_schedule")
    {

        if(!ifTableExist($table)) {

            sqlExecute("CREATE TABLE `{$table}` (
                `no` varchar(255) DEFAULT NULL,
                `uuid` char(40) NOT NULL DEFAULT '' COMMENT 'TLO-UUID',
                `label_schedule` char(7) NOT NULL DEFAULT '',
                `starttime_schedule` time DEFAULT NULL,
                `endtime_schedule` time DEFAULT NULL,
                `created_at` timestamp NULL DEFAULT NULL,
                `updated_at` timestamp NULL DEFAULT NULL,
                PRIMARY KEY (`uuid`),
                UNIQUE KEY `label_location` (`label_schedule`),
                UNIQUE KEY `index` (`no`)
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
            ");

        }
    }
}
