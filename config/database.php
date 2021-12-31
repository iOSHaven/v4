<?php

use Illuminate\Support\Str;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Database Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the database connections below you wish
    | to use as your default connection for all database work. Of course
    | you may use many connections at once using the Database library.
    |
    */

    'default' => env('DB_CONNECTION', 'mysql'),

    /*
    |--------------------------------------------------------------------------
    | Database Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the database connections setup for your application.
    | Of course, examples of configuring each database platform that is
    | supported by Laravel is shown below to make development simple.
    |
    |
    | All database work in Laravel is done through the PHP PDO facilities
    | so make sure you have the driver for your particular database of
    | choice installed on your machine before you begin development.
    |
    */

    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
        ],

        'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
            'sslmode' => env('DB_SSLMODE', 'required'),
            // 'options'   => array(
            //     PDO::MYSQL_ATTR_SSL_CA      => '/../ca-certificate.crt',
            //     // PDO::MYSQL_ATTR_SSL_CERT    => '/home/.../cert.pem',
            //     // PDO::MYSQL_ATTR_SSL_KEY     => '/home/.../key.pem'
            // ),
            'modes' => [
                'ONLY_FULL_GROUP_BY',
                'STRICT_TRANS_TABLES',
                'NO_ZERO_IN_DATE',
                'NO_ZERO_DATE',
                'ERROR_FOR_DIVISION_BY_ZERO',
                'NO_ENGINE_SUBSTITUTION',
            ],
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],

        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '1433'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Migration Repository Table
    |--------------------------------------------------------------------------
    |
    | This table keeps track of all the migrations that have already run for
    | your application. Using this information, we can determine which of
    | the migrations on disk haven't actually been run in the database.
    |
    */

    'migrations' => 'migrations',

    /*
    |--------------------------------------------------------------------------
    | Redis Databases
    |--------------------------------------------------------------------------
    |
    | Redis is an open source, fast, and advanced key-value store that also
    | provides a richer set of commands than a typical key-value systems
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'beanstalkd' => [
        'driver' => 'beanstalkd',
        'host'   => 'localhost',
        'queue'  => 'default',
        'ttr'    => 60,
    ],

    'redis' => [

        'client' => env('REDIS_CLIENT', 'phpredis'),

        'options' => [
            // 'cluster' => env('REDIS_CLUSTER', false),
            'password' => env('REDIS_PASSWORD', null),
            'ssl' => [
                'verify_peer' => true,
            ],
            // 'prefix' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_database_'),
        ],

        'default' => [
            'scheme' => env('REDIS_SCHEME', 'tls'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', 6379),
            'database' => env('REDIS_DB', 0),
        ],

        // 'cache' => [
        //     'scheme' => env('REDIS_SCHEME', 'tls'),
        //     'host' => env('REDIS_HOST', '127.0.0.1'),
        //     'password' => env('REDIS_PASSWORD', null),
        //     'port' => env('REDIS_PORT', 6379),
        //     'database' => env('REDIS_CACHE_DB', 1),
        // ],

    ],

    // 'redis' => [
    //     // 'driver' => 'phpredis',
    //     // 'connection' => 'default',
    //     // 'queue' => 'default',
    //     // 'retry_after' => 90,
    //     // 'block_for' => 5,
    //     'client' => env('REDIS_CLIENT', 'predis'),

    //     'options' => [
    //         'cluster' => env('REDIS_CLUSTER', false),
    //         'password' => env('REDIS_PASSWORD', null),
    //         'ssl' => [
    //             'verify_peer' => true,
    //         ],
    //         'prefix' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_database_'),
    //     ],

    //     'default' => [
    //         'scheme' => 'tls',
    //         'host' => env('REDIS_HOST', '127.0.0.1'),
    //         'password' => env('REDIS_PASSWORD', null),
    //         'port' => env('REDIS_PORT', 6379),
    //         'database' => 0,
    //         'read_timeout' => 5,
    //     ],

    //     // 'cache' => [
    //     //     'host' => env('REDIS_HOST', '127.0.0.1'),
    //     //     'password' => env('REDIS_PASSWORD', null),
    //     //     'port' => env('REDIS_PORT', 6379),
    //     //     'database' => 1,
    //     // ],

    //     // 'client' => env('REDIS_CLIENT', 'phpredis'),
    //     // // 'cluster' => env('REDIS_CLUSTER', false),
    //     // 'clusters' => [
    //     //     'default' => [
    //     //         [
    //     //             'scheme'    => env('REDIS_SCHEME', 'tls'),
    //     //             'host'      => env('REDIS_HOST', 'localhost'),
    //     //             'password'  => env('REDIS_PASSWORD', null),
    //     //             'port'      => env('REDIS_PORT', 6379),
    //     //             'database'  => env('REDIS_DATABASE', 0),
    //     //             'read_timeout' => 60
    //     //         ],
    //     //     ],
    //     //     'options' => [
    //     //         'cluster' => 'redis',
    //     //     ],
    //     // ],
    //     // 'options' => [
    //     //     'parameters' => [
    //     //         'password'  => env('REDIS_PASSWORD', null),
    //     //         'scheme'    => env('REDIS_SCHEME', 'tls'),
    //     //     ],
    //     //     'ssl' => [
    //     //         'verify_peer' => true,
    //     //     ],
    //     // ],

    // ],

];
