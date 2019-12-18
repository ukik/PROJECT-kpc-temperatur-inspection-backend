<?php

if (!function_exists('TrimString')) {
    function TrimString($sentence)
    {
        return preg_replace('/\s/', '', $sentence);
    }
}

if (!function_exists('Condition_Inspection')) {
    function Condition_Inspection($variable)
    {
        $n = "";
        switch ($variable) {
            case 'noise':
                $n = "1";
                break;
            case 'dusty':
                $n = "2";
                break;
            case 'vibration':
                $n = "3";
                break;
        }
        return strval($n);
    }
}

if (!function_exists('Weather_Inspection')) {
    function Weather_Inspection($variable)
    {
        $n = "";
        switch ($variable) {
            case 'cerah':
                $n = "1";
                break;
            case 'mendung':
                $n = "2";
                break;
            case 'hujan':
                $n = "3";
                break;
            case 'kabut':
                $n = "4";
                break;
            case 'angin':
                $n = "5";
                break;
            case 'lainnya':
                $n = "6";
                break;
        }
        return strval($n);
    }
}

if (!function_exists('Current_Upnormal_Inspection')) {
    function Current_Upnormal_Inspection($variable)
    {
        $n = "";
        switch ($variable) {
            case 'tidak ada':
                $n = "0";
                break;
            case 'ada':
                $n = "1";
                break;
        }
        return strval($n);
    }
}

if (!function_exists('Last_Upnormal_Inspection')) {
    function Last_Upnormal_Inspection($variable)
    {
        $n = "";
        switch ($variable) {
            case 'tidak ada':
                $n = "0";
                break;
            case 'ada':
                $n = "1";
                break;
        }
        return strval($n);
    }
}

if (!function_exists('Valid_Inspection')) {
    function Valid_Inspection($variable)
    {
        $n = "";
        switch ($variable) {
            case 'false':
                $n = "0";
                break;
            case 'true':
                $n = "1";
                break;
        }
        return strval($n);
    }
}
