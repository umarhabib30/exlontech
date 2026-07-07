<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Public Site URL
    |--------------------------------------------------------------------------
    |
    | Used for canonical tags, Open Graph URLs, and structured data on the
    | main marketing site. Keep this on exlontech.com even if APP_URL differs.
    |
    */

    'site_url' => rtrim(env('SITE_URL', env('APP_URL', 'https://exlontech.com')), '/'),

];
