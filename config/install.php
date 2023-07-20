<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Server Requirements
    |--------------------------------------------------------------------------
    */
    'php_version' => '7.4' ,

    'extensions' => [
        'php' => [
            'BCMath',
            'JSON',
            'Mbstring',
            'OpenSSL',
            'GD',
            'cURL'
        ],
        'apache' => [
            'mod_rewrite',
        ],
        'files' => [
            '.env',
            'database.sql',
            'app/Providers/RouteServiceProvider.php',
        ],
    ],
    
];
