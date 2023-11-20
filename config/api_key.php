<?php

return [

    /*
    |--------------------------------------------------------------------------
    | API Key
    |--------------------------------------------------------------------------
    |
    | This options are used by the middleware to check if the incoming requests
    | should be authorized using API key.
    |
    */

    'key' => env('API_KEY', false),

    /*
    |--------------------------------------------------------------------------
    | Middleware Settings
    |--------------------------------------------------------------------------
    |
    | This options configure the middleware behaviour.
    |
    */

    'alias' => env('API_KEY_ALIAS', 'auth.api_key'),
    'group' => env('API_KEY_GROUP', 'api'),
    'header' => env('API_KEY_HEADER', 'X-API-KEY'),
    'param' => env('API_KEY_PARAM', 'api_key'),

];
