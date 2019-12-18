<?php

if (!function_exists('Role')) {
    function Role()
    {
        if (\Auth::check()) {
            return \Auth::user()->position;
        }

        return null;
    }
}

if (!function_exists('Logged')) {
    function Logged()
    {
        return \Auth::check();
    }
}

if (!function_exists('User')) {
    function User()
    {
        return \Auth::user();
    }
}
