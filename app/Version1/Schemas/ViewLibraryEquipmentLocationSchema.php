<?php

/**
 * 
 */
trait ViewLibraryEquipmentLocationSchema
{

    public function createStaticViewLibraryEquipmentLocationSchema($view = "vw_library_equipment_location")
    {

        if (!ifViewExist($view)) {

            sqlExecute("CREATE VIEW `{$view}` AS 
				SELECT
				  `tb_library_equipment_location`.`id` AS `id`,
				  `tb_library_equipment_location`.`equipment_alias` AS `label_equipment`,
				  `tb_library_equipment_location`.`location_alias` AS `label_location`,
				  `tb_library_equipment_location`.`location_name` AS `name`,
				  `tb_library_equipment_location`.`place` AS `place`,
				  `tb_library_equipment_location`.`created_at` AS `created_at`,
				  `tb_library_equipment_location`.`updated_at` AS `updated_at`,
				  `tb_library_location`.`uuid` AS `uuid`
				FROM
				  (`tb_library_equipment_location`
				  JOIN `tb_library_equipment` ON `tb_library_equipment`.`label_equipment` =
					`tb_library_equipment_location`.`equipment_alias`)
				  JOIN `tb_library_location` ON `tb_library_equipment_location`.`location_alias`
					= `tb_library_location`.`label_location`
            ");
        }
    }
}
