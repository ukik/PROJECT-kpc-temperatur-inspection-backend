<?php

/**
 * 
 */
trait ViewReportGroupInformationSchema
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
                    `uuid` AS `uuid`,
                    `uuid_tb_inspection` AS `uuid_tb_inspection`,
                    `label_inspection_information` AS `label_inspection_information`,
                    group_concat(`description_inspection_information`) AS `description_inspection_information`,
                    `created_at` AS `created_at`,
                    `updated_at` AS `updated_at` 
                from 
                    `{$table}` 
                group by 
                    `label_inspection_information`;
            ");
        }
    }
}
