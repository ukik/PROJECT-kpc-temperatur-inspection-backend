<?php

if (!function_exists('Resolver')) {
    function Resolver(array $parameters = [])
    {
		$user = \Auth::user();
		if(!$user){
			$user = null;
		} else {
			$user = \TableEmployeeModel::whereUuid(\Auth::user()->uuid)->first();
		}
		
		$notifications = [
			'user'			=> $user,
			'notifications' => notifications()
		];
        return response()
            ->json(array_merge($parameters, $notifications))
            ->header('Content-Type', 'application/json')
            ->setStatusCode(200);
    }
}

if (!function_exists('Fallback')) {
    function Fallback($payload = null, $status = 400)
    {
        return response()
            ->json($payload)
            ->header('Content-Type', 'application/json')
            // ->header('Content-Type', 'application/x-www-form-urlencoded')
            ->setStatusCode($status);
    }
}
