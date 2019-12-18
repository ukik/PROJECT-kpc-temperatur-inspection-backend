<?php

if (!function_exists('Notifications')) {
    function Notifications()
    {
		return \ViewNotificationModel::select('employee','inspection')->first();
    }
}
