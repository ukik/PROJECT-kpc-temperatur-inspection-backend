
<?php

if (!function_exists('Decode')) {
    function Decode($args)
    {
        return base64_decode($args);
    }
}

if (!function_exists('SignitureInflate')) { // turn code into utf-8
    function SignitureInflate($args)
    {
        return base64_decode(gzinflate($args));
    }
}

if (!function_exists('SignitureDeflate')) { // turn utf-8 into code
    function SignitureDeflate($args)
    {
        return urlencode(gzdeflate($args));
    }
}

if (!function_exists('Encrypt')) {
    function Encrypt($args)
    {
        # convert password
        return \Crypt::encrypt($args);
    }
}

if (!function_exists('Decrypt')) {
    function Decrypt($encrypted)
    {
        # convert password
        return \Crypt::decrypt($encrypted);
    }
}

if (!function_exists('HashCreate')) {
    function HashCreate($plain)
    {
        return \Hash::make($plain);
    }
}

if (!function_exists('HashCheck')) {
    function HashCheck($plain, $hashed)
    {
        if (\Hash::check($plain, $hashed)) {
            return true;
        }
        return false;
    }
}
