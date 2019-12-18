
<?php

if (!function_exists('AuthCheck')) {
    function AuthCheck()
    {
        if (\Auth::check()) {
            return true;
        }
        return false;
    }
}
