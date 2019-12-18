<?php

if (!function_exists('Resolver')) {
    function Resolver($request = null, $payload = null, $auth = false, $model = null)
    {
        return response()
            ->json([
                'payload'    => $payload, 
                'role'       => AuthCheck() ? Auth::user()->position_employee : null, 
                // 'token'      => tokenCheck($request) ? JWTRefresh() : null, 
                'auth'       => $auth,
                'model'      => $model
            ])        
            ->header('Content-Type', 'application/json')
            // ->header('Content-Type', 'application/x-www-form-urlencoded')
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
