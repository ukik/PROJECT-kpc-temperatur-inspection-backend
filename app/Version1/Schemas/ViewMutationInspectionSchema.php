<?php

/**
 * 
 */
trait ViewMutationInspectionSchema
{
    public function createDynamicViewMutationInspectionSchema($view, $suffix)
    {

        if (!ifViewExist($view)) {

            sqlExecute(
                "CREATE VIEW `{$view}` AS
                SELECT
                `tb_mutation_inspection{$suffix}`.`uuid` AS `uuid`,
                `tb_mutation_inspection{$suffix}`.`uuid_tb_employee` AS `uuid_tb_employee`,
                `tb_mutation_inspection{$suffix}`.`uuid_tb_location` AS `uuid_tb_location`,
                `tb_mutation_inspection{$suffix}`.`uuid_tb_schedule` AS `uuid_tb_schedule`,
                `tb_mutation_inspection{$suffix}`.`uuid_tb_equipment` AS `uuid_tb_equipment`,
                (CASE
                    WHEN (`tb_mutation_inspection{$suffix}`.`place_inspection` = 'A')
                    THEN 'kanan'
                    WHEN (`tb_mutation_inspection{$suffix}`.`place_inspection` = 'B')
                    THEN 'kiri'
                    ELSE NULL
                END) AS `place_inspection`,
                (CASE
                    WHEN (`tb_mutation_inspection{$suffix}`.`condition_inspection` = '1')
                    THEN 'noise'
                    WHEN (`tb_mutation_inspection{$suffix}`.`condition_inspection` = '2')
                    THEN 'dusty'
                    WHEN (`tb_mutation_inspection{$suffix}`.`condition_inspection` = '3')
                    THEN 'vibration'
                END) AS `condition_inspection`,
                `tb_mutation_inspection{$suffix}`.`grease_shoot_inspection` AS
                `grease_shoot_inspection`,
                (CASE
                    WHEN (`tb_mutation_inspection{$suffix}`.`weather_inspection` = '1')
                    THEN 'cerah'
                    WHEN (`tb_mutation_inspection{$suffix}`.`weather_inspection` = '2')
                    THEN 'mendung'
                    WHEN (`tb_mutation_inspection{$suffix}`.`weather_inspection` = '3')
                    THEN 'hujan'
                    WHEN (`tb_mutation_inspection{$suffix}`.`weather_inspection` = '4')
                    THEN 'kabut'
                    WHEN (`tb_mutation_inspection{$suffix}`.`weather_inspection` = '5')
                    THEN 'angin'
                    WHEN (`tb_mutation_inspection{$suffix}`.`weather_inspection` = '6')
                    THEN 'lainnya'
                END) AS `weather_inspection`,
                `tb_mutation_inspection{$suffix}`.`temperature_inspection` AS
                `temperature_inspection`,
                `tb_mutation_inspection{$suffix}`.`rain_inspection` AS `rain_inspection`,
                (CASE
                    WHEN (`tb_mutation_inspection{$suffix}`.`current_upnormal_inspection` = '0')
                    THEN 'tidak ada'
                    WHEN (`tb_mutation_inspection{$suffix}`.`current_upnormal_inspection` = '1')
                    THEN 'ada'
                    ELSE NULL
                END) AS `current_upnormal_inspection`,
                `tb_mutation_inspection{$suffix}`.`current_upnormal_description_inspection` AS
                `current_upnormal_description_inspection`,
                (CASE
                    WHEN (`tb_mutation_inspection{$suffix}`.`last_upnormal_inspection` = '0')
                    THEN 'tidak ada'
                    WHEN (`tb_mutation_inspection{$suffix}`.`last_upnormal_inspection` = '1')
                    THEN 'ada'
                    ELSE NULL
                END) AS `last_upnormal_inspection`,
                `tb_mutation_inspection{$suffix}`.`last_upnormal_description_inspection` AS
                `last_upnormal_description_inspection`,
                `tb_mutation_inspection{$suffix}`.`common_description_inspection` AS
                `common_description_inspection`,
                `tb_mutation_inspection{$suffix}`.`screenshoot_inspection` AS
                `screenshoot_inspection`,
                (CASE
                    WHEN (`tb_mutation_inspection{$suffix}`.`valid_inspection` = '0')
                    THEN 'false'
                    WHEN (`tb_mutation_inspection{$suffix}`.`valid_inspection` = '1')
                    THEN 'true'
                    ELSE NULL
                END) AS `valid_inspection`,
                `tb_mutation_inspection{$suffix}`.`created_at` AS `created_at`,
                `tb_mutation_inspection{$suffix}`.`updated_at` AS `updated_at`,
                `tb_employee`.`name_employee` AS `name_employee`,
                `tb_library_equipment`.`label_equipment` AS `label_equipment`,
                `tb_library_equipment`.`name_equipment` AS `name_equipment`,
                `tb_library_location`.`label_location` AS `label_location`,
                `tb_library_location`.`name_location` AS `name_location`,
                `tb_library_schedule`.`label_schedule` AS `label_schedule`,
                `tb_library_schedule`.`starttime_schedule` AS `starttime_schedule`,
                `tb_library_schedule`.`endtime_schedule` AS `endtime_schedule`
                FROM
                `tb_library_schedule`
                INNER JOIN (`tb_library_location`
                INNER JOIN (`tb_library_equipment`
                INNER JOIN (`tb_employee`
                INNER JOIN (`tb_mutation_inspection{$suffix}`) ON `tb_employee`.`uuid` =
                    `tb_mutation_inspection{$suffix}`.`uuid_tb_employee`) ON
                    `tb_library_equipment`.`uuid` =
                    `tb_mutation_inspection{$suffix}`.`uuid_tb_equipment`) ON
                    `tb_library_location`.`uuid` =
                    `tb_mutation_inspection{$suffix}`.`uuid_tb_location`) ON
                    `tb_library_schedule`.`uuid` =
                    `tb_mutation_inspection{$suffix}`.`uuid_tb_schedule`"
            );
        }
    }

    public function createStaticViewMutationInspectionSchema($view)
    {

        if (!ifViewExist($view)) {

            sqlExecute(
                "CREATE VIEW `vw_mutation_inspection` AS 
                SELECT
                `tb_mutation_inspection`.`uuid` AS `uuid`,
                `tb_mutation_inspection`.`uuid_tb_employee` AS `uuid_tb_employee`,
                `tb_mutation_inspection`.`uuid_tb_location` AS `uuid_tb_location`,
                `tb_mutation_inspection`.`uuid_tb_schedule` AS `uuid_tb_schedule`,
                `tb_mutation_inspection`.`uuid_tb_equipment` AS `uuid_tb_equipment`,
                (CASE
                    WHEN (`tb_mutation_inspection`.`place_inspection` = 'A')
                    THEN 'kanan'
                    WHEN (`tb_mutation_inspection`.`place_inspection` = 'B')
                    THEN 'kiri'
                    ELSE NULL
                END) AS `place_inspection`,
                (CASE
                    WHEN (`tb_mutation_inspection`.`condition_inspection` = '1')
                    THEN 'noise'
                    WHEN (`tb_mutation_inspection`.`condition_inspection` = '2')
                    THEN 'dusty'
                    WHEN (`tb_mutation_inspection`.`condition_inspection` = '3')
                    THEN 'vibration'
                END) AS `condition_inspection`,
                `tb_mutation_inspection`.`grease_shoot_inspection` AS
                `grease_shoot_inspection`,
                (CASE
                    WHEN (`tb_mutation_inspection`.`weather_inspection` = '1')
                    THEN 'cerah'
                    WHEN (`tb_mutation_inspection`.`weather_inspection` = '2')
                    THEN 'mendung'
                    WHEN (`tb_mutation_inspection`.`weather_inspection` = '3')
                    THEN 'hujan'
                    WHEN (`tb_mutation_inspection`.`weather_inspection` = '4')
                    THEN 'kabut'
                    WHEN (`tb_mutation_inspection`.`weather_inspection` = '5')
                    THEN 'angin'
                    WHEN (`tb_mutation_inspection`.`weather_inspection` = '6')
                    THEN 'lainnya'
                END) AS `weather_inspection`,
                `tb_mutation_inspection`.`temperature_inspection` AS
                `temperature_inspection`,
                `tb_mutation_inspection`.`rain_inspection` AS `rain_inspection`,
                (CASE
                    WHEN (`tb_mutation_inspection`.`current_upnormal_inspection` = '0')
                    THEN 'tidak ada'
                    WHEN (`tb_mutation_inspection`.`current_upnormal_inspection` = '1')
                    THEN 'ada'
                    ELSE NULL
                END) AS `current_upnormal_inspection`,
                `tb_mutation_inspection`.`current_upnormal_description_inspection` AS
                `current_upnormal_description_inspection`,
                (CASE
                    WHEN (`tb_mutation_inspection`.`last_upnormal_inspection` = '0')
                    THEN 'tidak ada'
                    WHEN (`tb_mutation_inspection`.`last_upnormal_inspection` = '1')
                    THEN 'ada'
                    ELSE NULL
                END) AS `last_upnormal_inspection`,
                `tb_mutation_inspection`.`last_upnormal_description_inspection` AS
                `last_upnormal_description_inspection`,
                `tb_mutation_inspection`.`common_description_inspection` AS
                `common_description_inspection`,
                `tb_mutation_inspection`.`screenshoot_inspection` AS
                `screenshoot_inspection`,
                (CASE
                    WHEN (`tb_mutation_inspection`.`valid_inspection` = '0')
                    THEN 'false'
                    WHEN (`tb_mutation_inspection`.`valid_inspection` = '1')
                    THEN 'true'
                    ELSE NULL
                END) AS `valid_inspection`,
                `tb_mutation_inspection`.`created_at` AS `created_at`,
                `tb_mutation_inspection`.`updated_at` AS `updated_at`,
                `tb_employee`.`name_employee` AS `name_employee`,
                `tb_library_equipment`.`label_equipment` AS `label_equipment`,
                `tb_library_equipment`.`name_equipment` AS `name_equipment`,
                `tb_library_location`.`label_location` AS `label_location`,
                `tb_library_location`.`name_location` AS `name_location`,
                `tb_library_schedule`.`label_schedule` AS `label_schedule`,
                `tb_library_schedule`.`starttime_schedule` AS `starttime_schedule`,
                `tb_library_schedule`.`endtime_schedule` AS `endtime_schedule`
                FROM
                `tb_library_schedule`
                INNER JOIN (`tb_library_location`
                INNER JOIN (`tb_library_equipment`
                INNER JOIN (`tb_employee`
                INNER JOIN (`tb_mutation_inspection`) ON `tb_employee`.`uuid` =
                    `tb_mutation_inspection`.`uuid_tb_employee`) ON
                    `tb_library_equipment`.`uuid` =
                    `tb_mutation_inspection`.`uuid_tb_equipment`) ON
                    `tb_library_location`.`uuid` =
                    `tb_mutation_inspection`.`uuid_tb_location`) ON
                    `tb_library_schedule`.`uuid` =
                    `tb_mutation_inspection`.`uuid_tb_schedule`"
            );
        }
    }
}
