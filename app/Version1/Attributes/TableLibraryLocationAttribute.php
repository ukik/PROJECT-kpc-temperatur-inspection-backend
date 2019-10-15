<?php

/**
 * digunakan untuk melampirkan atribut place (0/1) sesuai map yang ada di static/EquipmentLocationStatic.php
 */
trait TableLibraryLocationAttribute
{

    use \EquipmentLocationStatic;

    public function getPlaceAttribute()
    {

        $data = null;
        foreach ($this->equipment as $key1 => $location) {
            # code...
            if ($key1 == getter('label_equipment')) {
                foreach ($location as $key2 => $value) {
                    # code...
                    if ($key2 == $this->label_location)
                        $data = $value[1];
                }
            }
        }
        return "{$data}";
    }
}
