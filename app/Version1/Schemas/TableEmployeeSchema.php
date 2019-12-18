<?php

/**
 * 
 */
trait TableEmployeeSchema
{
    public function createStaticTableEmployeeSchema($table = "tb_employee")
    {

        if(!ifTableExist($table)) {

            sqlExecute("CREATE TABLE `{$table}` 
                (
                    `no` int(11) DEFAULT NULL,
                    `uuid` char(40) NOT NULL DEFAULT '' COMMENT 'TEM-UUD',
                    `name_employee` varchar(50) NOT NULL DEFAULT '',
                    `position_employee` enum('0','1','2') DEFAULT NULL COMMENT '0 = SA, 1 = SV, 2 = TM',
                    `nik_employee` char(16) NOT NULL DEFAULT '',
                    `telpon_employee` varchar(20) NOT NULL DEFAULT '',
                    `email_employee` varchar(50) NOT NULL DEFAULT '',
                    `birth_place_employee` varchar(50) NOT NULL DEFAULT '',
                    `birth_date_employee` char(10) NOT NULL DEFAULT '',
                    `gender_employee` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = pria, 1 = wanita',
                    `marital_employee` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = lajang, 1 = menikah',
                    `address_employee` text NOT NULL,
                    `password_employee` varchar(50) NOT NULL DEFAULT '',
                    `plain_password_employee` varchar(50) NOT NULL DEFAULT '',
                    `photo_employee` varchar(150) DEFAULT NULL,
                    `verification_employee` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = unverified, 1 = verified',
					`verification_token` varchar(255) NOT NULL DEFAULT '',					
                    `disable_employee` enum('0','1') NOT NULL DEFAULT '0' COMMENT '0 = false, 1 = true',
                    `created_at` timestamp NULL DEFAULT NULL,
                    `updated_at` timestamp NULL DEFAULT NULL,
                    PRIMARY KEY (`uuid`),
                    UNIQUE KEY `index` (`no`)
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1;              
            ");

        }
    }
}
