
<?php

if (!function_exists('RequestMethod')) {
    function RequestMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}

if (!function_exists('GET')) {
    function GET($param)
    {
        isset($_GET[$param]) && !empty($_GET[$param]) === true ? $_GET[$param] : 0;
    }
}

if (!function_exists('POST')) {
    function POST($param)
    {
        isset($_POST[$param]) && !empty($_POST[$param]) === true ? $_POST[$param] : 0;
    }
}
