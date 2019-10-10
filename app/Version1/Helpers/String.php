<?php

if (!function_exists('TrimString')) {
    function TrimString($sentence)
    {
        return preg_replace('/\s/', '', $sentence);
    }
}
