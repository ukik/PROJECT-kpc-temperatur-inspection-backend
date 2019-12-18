<?php

/**
 * 
 */
trait UserSchema
{
    public function createStaticViewUserSchema($view = "user")
    {

        if (!ifViewExist($view)) {

            sqlExecute("CREATE VIEW `{$view}` AS 
				SELECT
				  `tb_employee`.`no` AS `no`,
				  `tb_employee`.`uuid` AS `uuid`,
				  `tb_employee`.`name_employee` AS `name`,
				  `tb_employee`.`position_employee` AS `position`,
				  `tb_employee`.`nik_employee` AS `nik`,
				  `tb_employee`.`telpon_employee` AS `telpon`,
				  `tb_employee`.`email_employee` AS `email`,
				  `tb_employee`.`birth_place_employee` AS `birth_place`,
				  `tb_employee`.`birth_date_employee` AS `birth_date`,
				  `tb_employee`.`gender_employee` AS `gender`,
				  `tb_employee`.`marital_employee` AS `marital`,
				  `tb_employee`.`address_employee` AS `address`,
				  `tb_employee`.`password_employee` AS `password`,
				  `tb_employee`.`plain_password_employee` AS `plain_password`,
				  `tb_employee`.`photo_employee` AS `photo`,
				  `tb_employee`.`verification_employee` AS `verification`,
				  `tb_employee`.`disable_employee` AS `disable`,
				  `tb_employee`.`created_at` AS `created_at`,
				  `tb_employee`.`updated_at`
				FROM
				  `tb_employee`
            ");
        }
    }
}
