<?php

return [

    /*
     |-----------------------------------------------------
     | Administrator Logo
     |-----------------------------------------------------
     |
     | You can change logo for login and admin page
     | we recommend to use size 150 x 45 pixels for best resolution,
     | you can add it with full URL, or as url path
     | if the logo is in your project.
     |
     */

    'logo' => env('LADMIN_LOGO_URL', 'https://github.com/laravel/art/blob/master/logo-lockup/4%20PNG/3%20RGB/1%20Full%20Color/laravel-logolockup-rgb-red.png?raw=true'),

    /*
     |-----------------------------------------------------
     |  Administrator Prefix
     |-----------------------------------------------------
     |
     | By default the prefix of this pckage is "administrator",
     | but you can change it as you want.
     | for example: "admin", "ladmin", "operator", "cpanel", etc.
     |
     */
    'prefix' => env('LADMIN_PREFIX_PAGE', 'administrator'),

    /*
     |-----------------------------------------------------
     | Administrator User
     |-----------------------------------------------------
     |
     | By default the user of this package will use User model
     | which is already provided by laravel, but you can also change it
     | into a class that extends to Illuminate\Foundation\Auth\User class.
     |
     */
    'user' => \Modules\Ladmin\Models\Admin::class,

    /*
     |-----------------------------------------------------
     | Authentication
     |----------------------------------------------------- 
     |
     | In this option you can change it as you want.
     | This option is filled according to the config/auth.php file.
     | if you have more than one admin page,
     | you can create a new guard and can use other auth scaffolding
     | like : "laravel/breeze", "laravel/ui", "jetstream", etc.
     |
     */
    'auth' => [
        'guard' => 'admin',
        'broker' => 'admins'
    ],

    /*
     |-----------------------------------------------------
     | Administrator Date format
     |----------------------------------------------------- 
     |
     | You can use this option for the date format of your app
     | by calling it manually in the format Carbon\Carbon
     |
     */
    'date' => [
        'format' => 'm/d/Y H:i'
    ],

    /*
     |-----------------------------------------------------
     | Administrator Template
     |-----------------------------------------------------
     |
     | Here you can change the css framework that you like.
     | You need to rebuild the base template for this ladmin,
     | and you can also sell or make it open source
     | so that it can be used later
     | 
     */
    'template' => [
        'module' => 'ladmin',
        'framework' => 'bootstrap'
    ],

    /*
     |-----------------------------------------------------
     | Ladmin User Activity
     |----------------------------------------------------- 
     | 
     | In this option you can set the duration of the activity log of the user
     | from your application. The log will be deleted automatically to free up storage
     |
     */
    'activity' => [
        'delete_period' => 7 // days
    ],

    /*
     |-----------------------------------------------------
     | Ladmin Option
     |----------------------------------------------------- 
     | 
     | Here you can specify the cache driver to use
     | in the Ladmin option, you can also disable it.
     | If this option is disabled then the data will be completely stored in the database
     |
     */

    'option' => [
        'cache' => [
            'enable' => true,
            'driver' => env('CACHE_DRIVER')
        ]
    ]

];
