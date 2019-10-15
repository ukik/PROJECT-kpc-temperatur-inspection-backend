<?php

/**
 * 
 */
trait ViewReportSchema
{
    public function createDynamicView($table, $view)
    {

        if (!ifTableExist($table, $view)) {

            sqlExecute("CREATE VIEW `{$view}` AS 
                select 
                    week(`created_at`,0) AS `week`,
                    year(`created_at`) AS `year`,
                    month(`created_at`) AS `month`,
                    monthname(`created_at`) AS `month_name`,
                    dayofmonth(`created_at`) AS `day`,
                    dayname(`created_at`) AS `day_name`,
                    cast(`created_at` as date) AS `date`,
                    cast(`created_at` as time) AS `time`,
                    -- `no` AS `no`,
                    `uuid` AS `uuid`,
                    `uuid_tb_employee` AS `uuid_tb_employee`,`uuid_tb_inspection` AS `uuid_tb_inspection`,
                    `uuid_tb_location` AS `uuid_tb_location`,
                    `uuid_tb_equipment` AS `uuid_tb_equipment`,
                    `place_inspection` AS `place_inspection`,
                    avg(`condition_inspection`) AS `avg_condition_inspection`,
                    avg(`grease_shoot_inspection`) AS `avg_grease_shoot_inspection`,
                    avg(`weather_inspection`) AS `avg_weather_inspection`,
                    avg(`temperature_inspection`) AS `avg_temperature_inspection`,avg(`rain_inspection`) AS `avg_rain_inspection`,
                    `current_upnormal_inspection` AS `current_upnormal_inspection`,
                    `last_upnormal_inspection` AS `last_upnormal_inspection`,
                    `screenshoot_inspection` AS `screenshoot_inspection`,`created_at` AS `created_at`,
                    `updated_at` AS `updated_at` 
                from 
                    `{$table}` 
                group by 
                    week(`created_at`,0),
                    year(`created_at`),
                    month(`created_at`),
                    monthname(`created_at`),
                    dayofmonth(`created_at`),
                    dayname(`created_at`),
                    cast(`created_at` as date),
                    cast(`created_at` as time),
                    `no`,`uuid`,
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
