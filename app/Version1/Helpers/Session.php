<?php

if (!function_exists('Setter')) {
    function Setter($key = null, $val = null)
    {
        return Session::flash($key, $val);
    }
}

if (!function_exists('Getter')) {
    function Getter($key = null)
    {
        return Session::get($key);
    }
}