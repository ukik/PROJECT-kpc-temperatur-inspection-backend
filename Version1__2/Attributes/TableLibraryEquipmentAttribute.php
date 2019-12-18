<?php

/**
 * digunakan untuk melampirkan atribut location pada model equipment sesuai dengan map yang ada di static/EquipmentLocationStatic.php
 */
trait TableLibraryEquipmentAttribute
{
    use \EquipmentLocationStatic;

    public function getLocationAttribute()
    {
        // session untuk TableLibraryLocationAttribute.php
        setter('label_equipment', $this->label_equipment);

        $data = \TableLibraryLocationModel::whereIn('label_location', array_keys($this->equipment[$this->label_equipment]))
            ->orderBy('no', 'asc')
            ->select(['uuid', 'name_location', 'label_location'])
            ->get();

        return $data;
    }

    public function setNameEquipmentAttribute($val)
    {
        
    }
}
