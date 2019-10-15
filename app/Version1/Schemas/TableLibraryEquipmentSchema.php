<?php

/**
 * 
 */
trait TableLibraryEquipmentSchema
{
    public function createStaticTable($table = "tb_library_equipment")
    {

        if(!ifTableExist($table)) {

            sqlExecute("CREATE TABLE `{$table}` 
                (
                    `no` int(11) DEFAULT NULL,
                    `uuid` char(40) NOT NULL DEFAULT '' COMMENT 'TLE-UUID',
                    `label_equipment` char(3) NOT NULL DEFAULT '',
                    `name_equipment` varchar(50) NOT NULL DEFAULT '',
                    `created_at` timestamp NULL DEFAULT NULL,
                    `updated_at` timestamp NULL DEFAULT NULL,
                    PRIMARY KEY (`uuid`),
                    UNIQUE KEY `label_equipment` (`label_equipment`),
                    UNIQUE KEY `index` (`no`)
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;
            ");

        }
    }
}
