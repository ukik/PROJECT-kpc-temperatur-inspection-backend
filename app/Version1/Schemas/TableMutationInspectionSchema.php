<?php

/**
 * 
 */
trait TableMutationInspectionSchema
{
    public function createStaticTable($table = "tb_mutation_inspection")
    {

        if (!ifTableExist($table)) {

            sqlExecute("CREATE TABLE `{$table}` (
                    -- `no` int(11) DEFAULT NULL,
                    `uuid` char(40) NOT NULL DEFAULT '' COMMENT 'TIS-UUID',
                    `uuid_tb_employee` char(40) NOT NULL DEFAULT '' COMMENT 'TEM-UUID (FK)',
                    `uuid_tb_inspection` char(40) DEFAULT NULL COMMENT 'TIS-UUID (FK)',
                    `uuid_tb_location` char(40) NOT NULL DEFAULT '' COMMENT 'TLO-UUID (FK)',
                    `uuid_tb_equipment` char(40) DEFAULT NULL COMMENT 'TLE-UUID (FK)',
                    `equipment_inspection` char(50) NOT NULL DEFAULT '' COMMENT 'static: ref to tb_library_equipment',
                    `location_inspection` char(50) NOT NULL DEFAULT '' COMMENT 'static: ref to tb_library_location',
                    `place_inspection` enum('A','B') DEFAULT NULL COMMENT 'A=kanan,B=kiri',
                    `condition_inspection` enum('1','2','3') DEFAULT NULL COMMENT '1=noise,2=dusty,3=vibration',
                    `grease_shoot_inspection` int(3) NOT NULL DEFAULT '0',
                    `weather_inspection` enum('1','2','3','4','5','6') NOT NULL DEFAULT '6' COMMENT '1=cerah,2=mendung,3=hujan,4=kabut,5=angin,6=lainnya',
                    `temperature_inspection` float(5,2) NOT NULL DEFAULT '0.00',
                    `rain_inspection` float(5,2) NOT NULL DEFAULT '0.00',
                    `current_upnormal_inspection` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = no, 1 = yes (cui = current upnormal inspection)',
                    `last_upnormal_inspection` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = no, 1 = yes (lui = last upnormal inspection)',
                    `screenshoot_inspection` varchar(150) DEFAULT '',
                    `created_at` timestamp NULL DEFAULT NULL,
                    `updated_at` timestamp NULL DEFAULT NULL,
                    PRIMARY KEY (`uuid`),
                    -- UNIQUE KEY `index` (`no`),
                    KEY `location_inspection` (`location_inspection`),
                    KEY `equipment_inspection` (`equipment_inspection`),
                    KEY `uuid_tb_location` (`uuid_tb_location`),
                    KEY `uuid_tb_employee` (`uuid_tb_employee`),
                    KEY `uuid_tb_equipment` (`uuid_tb_equipment`),
                    CONSTRAINT `tb_mutation_inspection_ibfk_1` FOREIGN KEY (`uuid_tb_equipment`) REFERENCES `tb_library_equipment` (`uuid`) ON DELETE NO ACTION,
                    CONSTRAINT `tb_mutation_inspection_ibfk_2` FOREIGN KEY (`uuid_tb_location`) REFERENCES `tb_library_location` (`uuid`) ON DELETE NO ACTION,
                    CONSTRAINT `tb_mutation_inspection_ibfk_3` FOREIGN KEY (`uuid_tb_employee`) REFERENCES `tb_employee` (`uuid`) ON DELETE CASCADE
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
            ");
        }
    }

    public function createDynamicTable($table)
    {

        if (!ifTableExist($table)) {

            sqlExecute("CREATE TABLE `{$table}` (
                    -- `no` int(11) DEFAULT NULL,
                    `uuid` char(40) NOT NULL DEFAULT '' COMMENT 'TIS-UUID',
                    `uuid_tb_employee` char(40) NOT NULL DEFAULT '' COMMENT 'TEM-UUID (FK)',
                    `uuid_tb_inspection` char(40) DEFAULT NULL COMMENT 'TIS-UUID (FK)',
                    `uuid_tb_location` char(40) NOT NULL DEFAULT '' COMMENT 'TLO-UUID (FK)',
                    `uuid_tb_equipment` char(40) DEFAULT NULL COMMENT 'TLE-UUID (FK)',
                    `equipment_inspection` char(50) NOT NULL DEFAULT '' COMMENT 'static: ref to tb_library_equipment',
                    `location_inspection` char(50) NOT NULL DEFAULT '' COMMENT 'static: ref to tb_library_location',
                    `place_inspection` enum('A','B') DEFAULT NULL COMMENT 'A=kanan,B=kiri',
                    `condition_inspection` enum('1','2','3') DEFAULT NULL COMMENT '1=noise,2=dusty,3=vibration',
                    `grease_shoot_inspection` int(3) NOT NULL DEFAULT '0',
                    `weather_inspection` enum('1','2','3','4','5','6') NOT NULL DEFAULT '6' COMMENT '1=cerah,2=mendung,3=hujan,4=kabut,5=angin,6=lainnya',
                    `temperature_inspection` float(5,2) NOT NULL DEFAULT '0.00',
                    `rain_inspection` float(5,2) NOT NULL DEFAULT '0.00',
                    `current_upnormal_inspection` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = no, 1 = yes (cui = current upnormal inspection)',
                    `last_upnormal_inspection` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = no, 1 = yes (lui = last upnormal inspection)',
                    `screenshoot_inspection` varchar(150) DEFAULT '',
                    `created_at` timestamp NULL DEFAULT NULL,
                    `updated_at` timestamp NULL DEFAULT NULL,
                    PRIMARY KEY (`uuid`),
                    -- UNIQUE KEY `index` (`no`),
                    KEY `location_inspection` (`location_inspection`),
                    KEY `equipment_inspection` (`equipment_inspection`),
                    KEY `uuid_tb_location` (`uuid_tb_location`),
                    KEY `uuid_tb_employee` (`uuid_tb_employee`),
                    KEY `uuid_tb_equipment` (`uuid_tb_equipment`),
                    CONSTRAINT `tb_mutation_inspection_ibfk_1_{$table}` FOREIGN KEY (`uuid_tb_equipment`) REFERENCES `tb_library_equipment` (`uuid`) ON DELETE NO ACTION,
                    CONSTRAINT `tb_mutation_inspection_ibfk_2_{$table}` FOREIGN KEY (`uuid_tb_location`) REFERENCES `tb_library_location` (`uuid`) ON DELETE NO ACTION,
                    CONSTRAINT `tb_mutation_inspection_ibfk_3_{$table}` FOREIGN KEY (`uuid_tb_employee`) REFERENCES `tb_employee` (`uuid`) ON DELETE CASCADE
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
            ");
        }
    }
}
