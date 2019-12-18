
<?php

if (!function_exists('SegmentExist')) {
    function SegmentExist($segment)
    {
        foreach (\Request::segments() as $key => $value) {
            if ($value == $segment) {
                return true;
            }
        }
        return false;
    }
}
