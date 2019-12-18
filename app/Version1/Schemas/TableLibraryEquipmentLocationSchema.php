<?php

/**
 * 
 */
trait TableLibraryEquipmentLocationSchema
{
    public function createStaticTableLibraryEquipmentLocationSchema($table = "tb_library_equipment_location")
    {

        if(!ifTableExist($table)) {

            sqlExecute("CREATE TABLE `{$table}` 
				(
				  `id` int(11) NOT NULL AUTO_INCREMENT,
				  `equipment_alias` char(3) NOT NULL DEFAULT '',
				  `location_alias` char(3) NOT NULL DEFAULT '',
				  `location_name` varchar(50) NOT NULL DEFAULT '',
				  `place` char(1) NOT NULL DEFAULT '0',
				  `created_at` timestamp NULL DEFAULT NULL,
				  `updated_at` timestamp NULL DEFAULT NULL,
				  PRIMARY KEY (`id`)
				) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=latin1 COMMENT='predefinition table';           
            ");

        }
    }
}
