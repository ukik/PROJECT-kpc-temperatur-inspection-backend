<?php

/**
 * 
 */
trait ViewReportGroupInformationSchema
{
    public function createDynamicViewReportGroupInformationSchema($view, $suffix)
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
                    `uuid_tb_inspection` AS `uuid_tb_inspection`,
                    `label_inspection_information` AS `label_inspection_information`,
                    group_concat(`description_inspection_information`) AS `description_inspection_information`,
                    `created_at` AS `created_at`,
                    `updated_at` AS `updated_at` 
                FROM 
                    `tb_mutation_inspection_information{$suffix}` 
                GROUP BY 
                    `label_inspection_information`;
            ");
        }
    }

    public function createStaticViewReportGroupInformationSchema($view)
    {

        if (!ifViewExist($view)) {
            
            sqlExecute("CREATE VIEW `vw_report_group_information` AS
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
                    `uuid_tb_inspection` AS `uuid_tb_inspection`,
                    `label_inspection_information` AS `label_inspection_information`,
                    group_concat(`description_inspection_information`) AS `description_inspection_information`,
                    `created_at` AS `created_at`,
                    `updated_at` AS `updated_at` 
                FROM 
                    `tb_mutation_inspection` 
                GROUP BY 
                    `label_inspection_information`;
            ");
        }
    }    
}
