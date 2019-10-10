<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel CORS
    |--------------------------------------------------------------------------
    |
    | allowedOrigins, allowedHeaders and allowedMethods can be set to array('*')
    | to accept any value.
    |
    */
   
    'supportsCredentials' => false,
    'allowedOrigins' => ['*'],
    'allowedOriginsPatterns' => [],
    'allowedHeaders' => ['Content-Type', 'Authorization', 'X-Requested-With', 'X-CSRF-Token'], #['*'],
    'allowedMethods' => ['GET', 'PUT', 'POST', 'DELETE', 'OPTIONS'], # ['*'],
    'exposedHeaders' => [],
    'maxAge' => 0,

];
