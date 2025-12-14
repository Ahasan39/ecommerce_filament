<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Steadfast Courier API Configuration
    |--------------------------------------------------------------------------
    |
    | This configuration options are used to authenticate with the Steadfast
    | Courier API. You should obtain these credentials from the Steadfast
    | Courier service provider.
    |
    */

    'base_url' => env('STEADFAST_BASE_URL', 'https://portal.packzy.com/api/v1'),

    'api_key' => env('STEADFAST_API_KEY', '5tf92t8w9evwmacr6f9gmwmoqjgslm6b'),

    'secret_key' => env('STEADFAST_SECRET_KEY', 'ipgp6ipukoqlywnrhmpsmahj'),

    /*
    |--------------------------------------------------------------------------
    | Default Content Type
    |--------------------------------------------------------------------------
    |
    | This option specifies the default content type to be used in requests
    | made to the Steadfast Courier API. You may modify this value if
    | necessary, but it's recommended to keep it as 'application/json'.
    |
    */

    'content_type' => 'application/json',
];
