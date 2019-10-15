<?php

/**
 * 
 */
trait TableMutationInspectionInformationSchema
{
    public function createStaticTable($table = "tb_mutation_inspection_information")
    {

        if (!ifTableExist($table)) {

            sqlExecute("CREATE TABLE `{$table}` 
                (
                    -- `no` int(11) DEFAULT NULL,
                    `uuid` char(40) NOT NULL DEFAULT '' COMMENT 'TIF-UUD',
                    `uuid_tb_inspection` char(40) NOT NULL DEFAULT '' COMMENT 'TIS-UUID (FK)',
                    `label_inspection_information` enum('cui','lui','com') DEFAULT NULL COMMENT 'cui=current-upnormal-inspection,lui=last-upnormal-inspection,com=common',
                    `description_inspection_information` text NOT NULL,
                    `created_at` timestamp NULL DEFAULT NULL,
                    `updated_at` timestamp NULL DEFAULT NULL,
                    PRIMARY KEY (`uuid`),
                    -- UNIQUE KEY `index` (`no`),
                    KEY `uuid_tb_inspection` (`uuid_tb_inspection`),
                    CONSTRAINT `tb_mutation_inspection_information_ibfk_1` FOREIGN KEY (`uuid_tb_inspection`) REFERENCES `tb_mutation_inspection` (`uuid`) ON DELETE CASCADE ON UPDATE CASCADE
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
            ");
        }
    }

    public function createDynamicTable($table)
    {

        if (!ifTableExist($table)) {

            sqlExecute("CREATE TABLE `{$table}` 
                (
                    -- `no` int(11) DEFAULT NULL,
                    `uuid` char(40) NOT NULL DEFAULT '' COMMENT 'TIF-UUD',
                    `uuid_tb_inspection` char(40) NOT NULL DEFAULT '' COMMENT 'TIS-UUID (FK)',
                    `label_inspection_information` enum('cui','lui','com') DEFAULT NULL COMMENT 'cui=current-upnormal-inspection,lui=last-upnormal-inspection,com=common',
                    `description_inspection_information` text NOT NULL,
                    `created_at` timestamp NULL DEFAULT NULL,
                    `updated_at` timestamp NULL DEFAULT NULL,
                    PRIMARY KEY (`uuid`),
                    -- UNIQUE KEY `index` (`no`),
                    KEY `uuid_tb_inspection` (`uuid_tb_inspection`)
                    -- CONSTRAINT `foreign_key_{$table}` FOREIGN KEY (`uuid_tb_inspection`) REFERENCES `{$table}` (`uuid`) ON DELETE CASCADE ON UPDATE CASCADE
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
            ");
        }
    }
}
