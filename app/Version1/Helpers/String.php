<?php

if (!function_exists('TrimString')) {
    function TrimString($sentence)
    {
        return preg_replace('/\s/', '', $sentence);
    }
}

if (!function_exists('Jabatan')) {
    function Jabatan($variable)
    {
        $n = "";
        switch ($variable) {
            case '0':
                $n = "admin";
                break;
            case '1':
                $n = "supervisor";
                break;
            case '2':
                $n = "temperature man";
                break;
        }
        return strval($n);
    }
}

if (!function_exists('Gender')) {
    function Gender($variable)
    {
        $n = "";
        switch ($variable) {
            case '0':
                $n = "pria";
                break;
            case '1':
                $n = "wanita";
                break;
        }
        return strval($n);
    }
}

if (!function_exists('Marital')) {
    function Marital($variable)
    {
        $n = "";
        switch ($variable) {
            case '0':
                $n = "lajang";
                break;
            case '1':
                $n = "menikah";
                break;
        }
        return strval($n);
    }
}

if (!function_exists('Verification')) {
    function Verification($variable)
    {
        $n = "";
        switch ($variable) {
            case '0':
                $n = "unverified";
                break;
            case '1':
                $n = "verified";
                break;
        }
        return strval($n);
    }
}

if (!function_exists('Disabled')) {
    function Disabled($variable)
    {
        $n = "";
        switch ($variable) {
            case '0':
                $n = "tidak";
                break;
            case '1':
                $n = "dikunci";
                break;
        }
        return strval($n);
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
            case false:
            case 'false':
                $n = "0";
                break;
            case 'true':
            case true:
                $n = "1";
                break;
        }
        return strval($n);
    }
}

if (!function_exists('Place_Inspection')) {
    function Place_Inspection($variable)
    {
        $n = "";
        switch ($variable) {
            case 'kanan':
            case 'Kanan':
            case 'A':
                $n = "A";
                break;
            case 'kiri':
            case 'Kiri':
            case 'B':
                $n = "B";
                break;
			default:
				$n = NULL;
				break;
        }
        return $n;
    }
}