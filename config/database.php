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

    'default' => env('DB_CONNECTION', 'mongodb'),

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
            'url' => env('DATABASE_URL'),
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
        ],

        'mysql' => [
            'driver' => 'mysql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'prefix_indexes' => true,
            'strict' => true,
            'engine' => null,
            'options' => extension_loaded('pdo_mysql') ? array_filter([
                PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
            ]) : [],
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],

        'sqlsrv' => [
            'driver' => 'sqlsrv',
            'url' => env('DATABASE_URL'),
            'host' => env('DB_HOST', 'localhost'),
            'port' => env('DB_PORT', '1433'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'prefix_indexes' => true,
        ],
        // 'mongodb' => [
        //     'driver' => 'mongodb',
        //     // mongodb+srv://doadmin:9Ro1J85AWCK7642D@alladspy-backup-ec332e40.mongo.ondigitalocean.com/admin?replicaSet=alladspy-backup&tls=true&authSource=admin
        //     'host' => 'mongodb+srv://doadmin:F8Z17pr26ok0f4A9@alladspy-original-79f663b7.mongo.ondigitalocean.com/',
        //     'dsn' => env('DB_URI', 'mongodb+srv://doadmin:F8Z17pr26ok0f4A9@alladspy-original-79f663b7.mongo.ondigitalocean.com/admin?tls=true&authSource=admin&replicaSet=alladspy-original'),
        //     'database' => 'alladspy',
        //     'username' => 'doadmin',
        //     'password' => 'F8Z17pr26ok0f4A9',
        //     'port' => env('DB_PORT', '27017'),
        //     'options' => [
        //         // here you can pass more settings to the Mongo Driver Manager
        //         // see https://www.php.net/manual/en/mongodb-driver-manager.construct.php under "Uri Options" for a list of complete parameters that you can use
        
        //         'database' => env('DB_AUTHENTICATION_DATABASE', 'admin'), // required with Mongo 3+
        //     ],
        // ],

        'mongodb' => [
            'driver'   => 'mongodb',
            // 'dsn' => env('DB_URI', 'mongodb+srv://hamza:taJk7F6B3mW3@cluster0.fhbjs.mongodb.net/laravel?retryWrites=true&w=majority'),
            //  'database' => 'laravel',
            'host' => 'mongodb+srv://doadmin:T2BCfFz1A4978S36@testing-5dc1cbf7.mongo.ondigitalocean.com/',
            'dsn' => env('DB_URI', 'mongodb+srv://doadmin:T2BCfFz1A4978S36@testing-5dc1cbf7.mongo.ondigitalocean.com/alladspy?tls=true&authSource=admin&replicaSet=testing'),
            'port'     => env('DB_PORT', "27017"),
            'database' => 'alladspy',
            'username' => 'doadmin',
            'password' => 'T2BCfFz1A4978S36',
            'options'  => [
            'database' => env('DB_AUTHENTICATION_DATABASE', 'admin')
        ]
        ],


    // 'mongodb' => [
    //     'driver' => 'mongodb',
    //     'host' => 'mongodb://sondosblog:SUMsung6056@alladspy.com:27017',
    //     'dsn' => env('DB_URI', 'mongodb://sondosblog:SUMsung6056@alladspy.com:27017/?authSource=admin'),
    //     'database' => 'sondosblog',
    //     'username' => 'sondosblog',
    //     'password' => 'SUMsung6056',
    //     'port' => env('DB_PORT', '27017'),
    //     'options' => [
    //         // here you can pass more settings to the Mongo Driver Manager
    //         // see https://www.php.net/manual/en/mongodb-driver-manager.construct.php under "Uri Options" for a list of complete parameters that you can use
    
    //         'database' => env('DB_AUTHENTICATION_DATABASE', 'admin'), // required with Mongo 3+
    //     ],
    // ],


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
    | provides a richer body of commands than a typical key-value system
    | such as APC or Memcached. Laravel makes it easy to dig right in.
    |
    */

    'redis' => [

        'client' => env('REDIS_CLIENT', 'phpredis'),

        'options' => [
            'cluster' => env('REDIS_CLUSTER', 'redis'),
            'prefix' => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_').'_database_'),
        ],

        'default' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_DB', '0'),
        ],

        'cache' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'password' => env('REDIS_PASSWORD', null),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_CACHE_DB', '1'),
        ],

    ],

];
