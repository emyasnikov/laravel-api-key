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

    'api_key' => env('API_KEY', false),

];
