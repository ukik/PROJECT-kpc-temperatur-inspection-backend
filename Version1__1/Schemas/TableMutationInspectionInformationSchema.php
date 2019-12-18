<?php

/**
 * 
 */
trait TableMutationInspectionInformationSchema
{

    public function createDynamicTableMutationInspectionInformationSchema($table, $parent)
    {

        if (!ifTableExist($table)) {

            sqlExecute("CREATE TABLE `{$table}` 
                (
                    `uuid` char(40) NOT NULL DEFAULT '' COMMENT 'TIF-UUD',
                    `uuid_tb_inspection` char(40) NOT NULL DEFAULT '' COMMENT 'TIS-UUID (FK)',
                    `label_inspection_information` enum('cui','lui','com') DEFAULT NULL COMMENT 'cui=current-upnormal-inspection,lui=last-upnormal-inspection,com=common',
                    `description_inspection_information` text NOT NULL,
                    `created_at` timestamp NULL DEFAULT NULL,
                    `updated_at` timestamp NULL DEFAULT NULL,
                    PRIMARY KEY (`uuid`),
                    UNIQUE KEY `Restrict Key` (`uuid_tb_inspection`,`label_inspection_information`),
                    KEY `uuid_tb_inspection` (`uuid_tb_inspection`),
                    CONSTRAINT `{$table}` FOREIGN KEY (`uuid_tb_inspection`) REFERENCES `{$parent}` (`uuid`) ON DELETE CASCADE ON UPDATE CASCADE
                    #CONSTRAINT `{$table}" . rand(0, 1000) . "` FOREIGN KEY (`uuid_tb_inspection`) REFERENCES `tb_mutation_inspection` (`uuid`) ON DELETE CASCADE ON UPDATE CASCADE
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
            ");
        }
    }

    public function createStaticTableMutationInspectionInformationSchema($table = "tb_mutation_inspection_information")
    {

        if (!ifTableExist($table)) {

            sqlExecute("CREATE TABLE `tb_mutation_inspection_information` 
                (
                    `uuid` char(40) NOT NULL DEFAULT '' COMMENT 'TIF-UUD',
                    `uuid_tb_inspection` char(40) NOT NULL DEFAULT '' COMMENT 'TIS-UUID (FK)',
                    `label_inspection_information` enum('cui','lui','com') DEFAULT NULL COMMENT 'cui=current-upnormal-inspection,lui=last-upnormal-inspection,com=common',
                    `description_inspection_information` text NOT NULL,
                    `created_at` timestamp NULL DEFAULT NULL,
                    `updated_at` timestamp NULL DEFAULT NULL,
                    PRIMARY KEY (`uuid`),
                    UNIQUE KEY `Restrict Key` (`uuid_tb_inspection`,`label_inspection_information`),
                    KEY `uuid_tb_inspection` (`uuid_tb_inspection`),
                    CONSTRAINT `tb_mutation_inspection_information` FOREIGN KEY (`uuid_tb_inspection`) REFERENCES `tb_mutation_inspection` (`uuid`) ON DELETE CASCADE ON UPDATE CASCADE
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1;
            ");
        }
    }
}
