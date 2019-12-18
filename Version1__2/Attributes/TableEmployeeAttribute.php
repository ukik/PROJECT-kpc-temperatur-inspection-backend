<?php

/**
 * digunakan untuk melampirkan atribut place (0/1) sesuai map yang ada di static/EquipmentLocationStatic.php
 */
trait TableEmployeeAttribute
{

    public function getDisableEmployeeAttribute($value)
    {
        return $value == '0' ? false : true;
    }
}
