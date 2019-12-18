<?php

trait TableMutationInspectionAttribute
{

    public function getPlaceInspectionAttribute($value)
    {
        switch ($value) {
            case 'A':
                return 'kanan';
            case 'B':
                return 'kiri';
            default:
                return NULL;
        }
    }

    public function getConditionInspectionAttribute($value)
    {
        switch ($value) {
            case '1':
                return "noise";
            case '2':
                return "dusty";
            case '3':
                return "vibration";
        }

    }

    public function getWeatherInspectionAttribute($value)
    {
        switch ($value) {
            case '1':
                return "cerah";
            case '2':
                return "mendung";
            case '3':
                return "hujan";
            case '4':
                return "kabut";
            case '5':
                return "angin";
            case '6':
                return "lainnya";
        }
    }    

    public function getCurrentUpnormalInspectionAttribute($value)
    {
        switch ($value) {
            case '0':
                return 'tidak ada';
            case '1':
                return 'ada';
        }
    }    

    public function getLastUpnormalInspectionAttribute($value)
    {
        switch ($value) {
            case '0':
                return 'tidak ada';
            case '1':
                return 'ada';
        }
    }  
    
    public function getValidInspectionAttribute($value)
    {
        switch ($value) {
            case '0':
                return 'false';
            case '1':
                return 'true';
        }
    }        
}

