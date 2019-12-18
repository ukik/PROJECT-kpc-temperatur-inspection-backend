<?php

/**
 * 
 */
trait TableMutationInspectionSchema
{

    public function createDynamicTableMutationInspectionSchema($table)
    {

        if (!ifTableExist($table)) {

            sqlExecute("CREATE TABLE `{$table}` (
                    `uuid` char(40) NOT NULL DEFAULT '' COMMENT 'TIS-UUID',
                    `uuid_tb_employee` char(40) NOT NULL DEFAULT '' COMMENT 'TEM-UUID (FK)',
                    `uuid_tb_schedule` char(40) NOT NULL DEFAULT '' COMMENT 'TLS-UUID (FK)',                    
                    `uuid_tb_location` char(40) NOT NULL DEFAULT '' COMMENT 'TLO-UUID (FK)',
                    `uuid_tb_equipment` char(40) DEFAULT NULL COMMENT 'TLE-UUID (FK)',
                    `place_inspection` enum('A','B') DEFAULT NULL COMMENT 'A=kanan,B=kiri',
                    `condition_inspection` enum('1','2','3') DEFAULT NULL COMMENT '1=noise,2=dusty,3=vibration',
                    `grease_shoot_inspection` int(3) NOT NULL DEFAULT '0',
                    `weather_inspection` enum('1','2','3','4','5','6') NOT NULL DEFAULT '6' COMMENT '1=cerah,2=mendung,3=hujan,4=kabut,5=angin,6=lainnya',
                    `temperature_inspection` float(5,2) NOT NULL DEFAULT '0.00',
                    `rain_inspection` float(5,2) NOT NULL DEFAULT '0.00',
                    `current_upnormal_inspection` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=tidak ada, 1=ada (cui = current upnormal inspection)',
                    `current_upnormal_description_inspection` text,
                    `last_upnormal_inspection` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=tidak ada, 1=ada (lui = last upnormal inspection)',
                    `last_upnormal_description_inspection` text,
                    `common_description_inspection` text,
                    `screenshoot_inspection` varchar(150) DEFAULT '',
					'valid_inspection` char(1) NOT NULL DEFAULT '' COMMENT '0 = false, 1 = true',					
                    `created_at` timestamp NULL DEFAULT NULL,
                    `updated_at` timestamp NULL DEFAULT NULL,
                    PRIMARY KEY (`uuid`),
                    KEY `uuid_tb_location` (`uuid_tb_location`),
                    KEY `uuid_tb_employee` (`uuid_tb_employee`),
                    KEY `uuid_tb_equipment` (`uuid_tb_equipment`),
                    KEY `uuid_tb_schedule` (`uuid_tb_schedule`),
                    CONSTRAINT `{$table}_1` FOREIGN KEY (`uuid_tb_employee`) REFERENCES `tb_employee` (`uuid`) ON UPDATE CASCADE,
                    CONSTRAINT `{$table}_2` FOREIGN KEY (`uuid_tb_location`) REFERENCES `tb_library_location` (`uuid`) ON UPDATE CASCADE,
                    CONSTRAINT `{$table}_3` FOREIGN KEY (`uuid_tb_schedule`) REFERENCES `tb_library_schedule` (`uuid`) ON UPDATE CASCADE,
                    CONSTRAINT `{$table}_4` FOREIGN KEY (`uuid_tb_equipment`) REFERENCES `tb_library_equipment` (`uuid`) ON UPDATE CASCADE                         
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
            ");
        }
    }

    public function createStaticTableMutationInspectionSchema($table = "tb_mutation_inspection")
    {

        if (!ifTableExist($table)) {

            sqlExecute("CREATE TABLE `tb_mutation_inspection` (
                    `uuid` char(40) NOT NULL DEFAULT '' COMMENT 'TIS-UUID',
                    `uuid_tb_employee` char(40) NOT NULL DEFAULT '' COMMENT 'TEM-UUID (FK)',
                    `uuid_tb_schedule` char(40) NOT NULL DEFAULT '' COMMENT 'TLS-UUID (FK)',                    
                    `uuid_tb_location` char(40) NOT NULL DEFAULT '' COMMENT 'TLO-UUID (FK)',
                    `uuid_tb_equipment` char(40) DEFAULT NULL COMMENT 'TLE-UUID (FK)',
                    `place_inspection` enum('A','B') DEFAULT NULL COMMENT 'A=kanan,B=kiri',
                    `condition_inspection` enum('1','2','3') DEFAULT NULL COMMENT '1=noise,2=dusty,3=vibration',
                    `grease_shoot_inspection` int(3) NOT NULL DEFAULT '0',
                    `weather_inspection` enum('1','2','3','4','5','6') NOT NULL DEFAULT '6' COMMENT '1=cerah,2=mendung,3=hujan,4=kabut,5=angin,6=lainnya',
                    `temperature_inspection` float(5,2) NOT NULL DEFAULT '0.00',
                    `rain_inspection` float(5,2) NOT NULL DEFAULT '0.00',
                    `current_upnormal_inspection` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=tidak ada, 1=ada (cui = current upnormal inspection)',
                    `current_upnormal_description_inspection` text,
                    `last_upnormal_inspection` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0=tidak ada, 1=ada (lui = last upnormal inspection)',
                    `last_upnormal_description_inspection` text,
                    `common_description_inspection` text,
                    `screenshoot_inspection` varchar(150) DEFAULT '',
					'valid_inspection` char(1) NOT NULL DEFAULT '' COMMENT '0 = false, 1 = true',					
                    `created_at` timestamp NULL DEFAULT NULL,
                    `updated_at` timestamp NULL DEFAULT NULL,
                    PRIMARY KEY (`uuid`),
                    KEY `uuid_tb_location` (`uuid_tb_location`),
                    KEY `uuid_tb_employee` (`uuid_tb_employee`),
                    KEY `uuid_tb_equipment` (`uuid_tb_equipment`),
                    KEY `uuid_tb_schedule` (`uuid_tb_schedule`),
                    CONSTRAINT `tb_mutation_inspection_1` FOREIGN KEY (`uuid_tb_employee`) REFERENCES `tb_employee` (`uuid`) ON UPDATE CASCADE,
                    CONSTRAINT `tb_mutation_inspection_2` FOREIGN KEY (`uuid_tb_location`) REFERENCES `tb_library_location` (`uuid`) ON UPDATE CASCADE,
                    CONSTRAINT `tb_mutation_inspection_3` FOREIGN KEY (`uuid_tb_schedule`) REFERENCES `tb_library_schedule` (`uuid`) ON UPDATE CASCADE,
                    CONSTRAINT `tb_mutation_inspection_4` FOREIGN KEY (`uuid_tb_equipment`) REFERENCES `tb_library_equipment` (`uuid`) ON UPDATE CASCADE               
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
            ");
        }
    }
}
