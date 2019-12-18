<?php

/**
 * 
 */
trait ViewReportSchema
{
    public function createDynamicViewReportSchema($view, $suffix)
    {

        if (!ifViewExist($view)) {

            sqlExecute("CREATE VIEW `{$view}` AS 
                SELECT 
                    week(`created_at`,0) AS `week`,
                    year(`created_at`) AS `year`,
                    month(`created_at`) AS `month`,
                    monthname(`created_at`) AS `month_name`,
                    dayofmonth(`created_at`) AS `day`,
                    dayname(`created_at`) AS `day_name`,
                    cast(`created_at` as date) AS `date`,
                    cast(`created_at` as time) AS `time`,
                    `uuid` AS `uuid`,
                    `uuid_tb_employee` AS `uuid_tb_employee`,
                    `uuid_tb_inspection` AS `uuid_tb_inspection`,
                    `uuid_tb_location` AS `uuid_tb_location`,
                    `uuid_tb_equipment` AS `uuid_tb_equipment`,
                    `place_inspection` AS `place_inspection`,
                    avg(`condition_inspection`) AS `avg_condition_inspection`,
                    avg(`grease_shoot_inspection`) AS `avg_grease_shoot_inspection`,
                    avg(`weather_inspection`) AS `avg_weather_inspection`,
                    avg(`temperature_inspection`) AS `avg_temperature_inspection`,
                    avg(`rain_inspection`) AS `avg_rain_inspection`,
                    `current_upnormal_inspection` AS `current_upnormal_inspection`,
                    `last_upnormal_inspection` AS `last_upnormal_inspection`,
                    `screenshoot_inspection` AS `screenshoot_inspection`,
                    `created_at` AS `created_at`,
                    `updated_at` AS `updated_at` 
                FROM 
                    `tb_mutation_inspection{$suffix}` 
                GROUP BY 
                    week(`created_at`,0),
                    year(`created_at`),
                    month(`created_at`),
                    monthname(`created_at`),
                    dayofmonth(`created_at`),
                    dayname(`created_at`),
                    cast(`created_at` as date),
                    cast(`created_at` as time),
                `uuid`,
                    `uuid_tb_employee`,
                    `uuid_tb_inspection`,
                    `uuid_tb_location`,
                    `uuid_tb_equipment`,
                    `place_inspection`,
                    `current_upnormal_inspection`,
                    `last_upnormal_inspection`,
                    `screenshoot_inspection`,
                    `created_at`,
                    `updated_at`;
            ");
        }
    }

    public function createStaticViewReportQuartalSchema($view, $suffix)
    {
        if (!ifViewExist($view, $suffix[0]) && !ifViewExist($view, $suffix[1]) && !ifViewExist($view, $suffix[2])) {

            // sqlExecute("DROP VIEW IF EXISTS `{$$view}`;");
            sqlExecute("CREATE VIEW `{$view}` AS 
                SELECT
                    `week`,
                    `year`,
                    `month`,
                    `month_name`,
                    `day`,
                    `day_name`,
                    `date`,
                    `time`,
                    `uuid`,
                    `uuid_tb_employee`,
                    `uuid_tb_inspection`,
                    `uuid_tb_location`,
                    `uuid_tb_equipment`,
                    `place_inspection`,
                    avg(`avg_condition_inspection`) AS `avg_condition_inspection`,
                    avg(`avg_grease_shoot_inspection`) AS `avg_grease_shoot_inspection`,
                    avg(`avg_weather_inspection`) AS `avg_weather_inspection`,
                    avg(`avg_temperature_inspection`) AS `avg_temperature_inspection`,
                    avg(`avg_rain_inspection`) AS `avg_rain_inspection`,
                    `current_upnormal_inspection`,
                    `last_upnormal_inspection`,
                    `screenshoot_inspection`,
                    `created_at`,
                    `updated_at`
                FROM
                    `vw_report{$suffix[0]}`
                GROUP BY
                    `week`,
                    `year`,
                    `month`,
                    `month_name`,
                    `day`,
                    `day_name`,
                    `date`,
                    `time`,
                    `uuid`,
                    `uuid_tb_employee`,
                    `uuid_tb_inspection`,
                    `uuid_tb_location`,
                    `uuid_tb_equipment`,
                    `place_inspection`,
                    `avg_condition_inspection`,
                    `avg_grease_shoot_inspection`,
                    `avg_weather_inspection`,
                    `avg_temperature_inspection`,
                    `avg_rain_inspection`,
                    `current_upnormal_inspection`,
                    `last_upnormal_inspection`,
                    `screenshoot_inspection`,
                    `created_at`,
                    `updated_at`                    
                UNION
                SELECT
                    `week`,
                    `year`,
                    `month`,
                    `month_name`,
                    `day`,
                    `day_name`,
                    `date`,
                    `time`,
                    `uuid`,
                    `uuid_tb_employee`,
                    `uuid_tb_inspection`,
                    `uuid_tb_location`,
                    `uuid_tb_equipment`,
                    `place_inspection`,
                    avg(`avg_condition_inspection`) AS `avg_condition_inspection`,
                    avg(`avg_grease_shoot_inspection`) AS `avg_grease_shoot_inspection`,
                    avg(`avg_weather_inspection`) AS `avg_weather_inspection`,
                    avg(`avg_temperature_inspection`) AS `avg_temperature_inspection`,
                    avg(`avg_rain_inspection`) AS `avg_rain_inspection`,
                    `current_upnormal_inspection`,
                    `last_upnormal_inspection`,
                    `screenshoot_inspection`,
                    `created_at`,
                    `updated_at`
                FROM
                    `vw_report{$suffix[1]}`
                GROUP BY
                    `week`,
                    `year`,
                    `month`,
                    `month_name`,
                    `day`,
                    `day_name`,
                    `date`,
                    `time`,
                    `uuid`,
                    `uuid_tb_employee`,
                    `uuid_tb_inspection`,
                    `uuid_tb_location`,
                    `uuid_tb_equipment`,
                    `place_inspection`,
                    `avg_condition_inspection`,
                    `avg_grease_shoot_inspection`,
                    `avg_weather_inspection`,
                    `avg_temperature_inspection`,
                    `avg_rain_inspection`,
                    `current_upnormal_inspection`,
                    `last_upnormal_inspection`,
                    `screenshoot_inspection`,
                    `created_at`,
                    `updated_at`                     
                UNION
                SELECT
                    `week`,
                    `year`,
                    `month`,
                    `month_name`,
                    `day`,
                    `day_name`,
                    `date`,
                    `time`,
                    `uuid`,
                    `uuid_tb_employee`,
                    `uuid_tb_inspection`,
                    `uuid_tb_location`,
                    `uuid_tb_equipment`,
                    `place_inspection`,
                    avg(`avg_condition_inspection`) AS `avg_condition_inspection`,
                    avg(`avg_grease_shoot_inspection`) AS `avg_grease_shoot_inspection`,
                    avg(`avg_weather_inspection`) AS `avg_weather_inspection`,
                    avg(`avg_temperature_inspection`) AS `avg_temperature_inspection`,
                    avg(`avg_rain_inspection`) AS `avg_rain_inspection`,
                    `current_upnormal_inspection`,
                    `last_upnormal_inspection`,
                    `screenshoot_inspection`,
                    `created_at`,
                    `updated_at`
                FROM
                    `vw_report{$suffix[2]}`
                GROUP BY
                    `week`,
                    `year`,
                    `month`,
                    `month_name`,
                    `day`,
                    `day_name`,
                    `date`,
                    `time`,
                    `uuid`,
                    `uuid_tb_employee`,
                    `uuid_tb_inspection`,
                    `uuid_tb_location`,
                    `uuid_tb_equipment`,
                    `place_inspection`,
                    `avg_condition_inspection`,
                    `avg_grease_shoot_inspection`,
                    `avg_weather_inspection`,
                    `avg_temperature_inspection`,
                    `avg_rain_inspection`,
                    `current_upnormal_inspection`,
                    `last_upnormal_inspection`,
                    `screenshoot_inspection`,
                    `created_at`,
                    `updated_at`                     
            ");
        }
    }

    public function createStaticViewReportSchema($view)
    {

        if (!ifViewExist($view)) {

            sqlExecute("CREATE VIEW `vw_report` AS 
                SELECT 
                    week(`created_at`,0) AS `week`,
                    year(`created_at`) AS `year`,
                    month(`created_at`) AS `month`,
                    monthname(`created_at`) AS `month_name`,
                    dayofmonth(`created_at`) AS `day`,
                    dayname(`created_at`) AS `day_name`,
                    cast(`created_at` as date) AS `date`,
                    cast(`created_at` as time) AS `time`,
                    `uuid` AS `uuid`,
                    `uuid_tb_employee` AS `uuid_tb_employee`,`uuid_tb_inspection` AS `uuid_tb_inspection`,
                    `uuid_tb_location` AS `uuid_tb_location`,
                    `uuid_tb_equipment` AS `uuid_tb_equipment`,
                    `place_inspection` AS `place_inspection`,
                    avg(`condition_inspection`) AS `avg_condition_inspection`,
                    avg(`grease_shoot_inspection`) AS `avg_grease_shoot_inspection`,
                    avg(`weather_inspection`) AS `avg_weather_inspection`,
                    avg(`temperature_inspection`) AS `avg_temperature_inspection`,
                    avg(`rain_inspection`) AS `avg_rain_inspection`,
                    `current_upnormal_inspection` AS `current_upnormal_inspection`,
                    `last_upnormal_inspection` AS `last_upnormal_inspection`,
                    `screenshoot_inspection` AS `screenshoot_inspection`,`created_at` AS `created_at`,
                    `updated_at` AS `updated_at` 
                FROM 
                    `tb_mutation_inspection` 
                GROUP BY 
                    week(`created_at`,0),
                    year(`created_at`),
                    month(`created_at`),
                    monthname(`created_at`),
                    dayofmonth(`created_at`),
                    dayname(`created_at`),
                    cast(`created_at` as date),
                    cast(`created_at` as time),
                    `uuid`,
                    `uuid_tb_employee`,
                    `uuid_tb_inspection`,
                    `uuid_tb_location`,
                    `uuid_tb_equipment`,
                    `place_inspection`,
                    `current_upnormal_inspection`,
                    `last_upnormal_inspection`,
                    `screenshoot_inspection`,
                    `created_at`,
                    `updated_at`;
            ");
        }
    }
}
