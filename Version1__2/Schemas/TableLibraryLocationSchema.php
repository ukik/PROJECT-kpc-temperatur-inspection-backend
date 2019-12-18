<?php

/**
 * 
 */
trait TableLibraryLocationSchema
{
    public function createStaticTableLibraryLocationSchema($table = "tb_library_location")
    {

        if(!ifTableExist($table)) {

            sqlExecute("CREATE TABLE `${$table}` 
                (
                    `no` varchar(255) DEFAULT NULL,
                    `uuid` char(40) NOT NULL DEFAULT '' COMMENT 'TLO-UUID',
                    `label_location` char(3) NOT NULL DEFAULT '',
                    `name_location` varchar(50) NOT NULL DEFAULT '',
                    `created_at` timestamp NULL DEFAULT NULL,
                    `updated_at` timestamp NULL DEFAULT NULL,
                    PRIMARY KEY (`uuid`),
                    UNIQUE KEY `label_location` (`label_location`),
                    UNIQUE KEY `index` (`no`)
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
            ");

        }
    }
}
