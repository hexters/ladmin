<?php 

  return [
    
    /**
     * Url image logo
     */
    'logo' => env('LADMIN_LOGO', 'https://github.com/hexters/ladmin/blob/master/logo.svg?raw=true'),

    /**
     * Administrator prefix page
     */
    'prefix' => 'administrator',
    
    /**
     * Authentication Setting
     */
    'auth' => [
      'user' => App\Models\User::class,
      'guard' => 'web'
    ],

    /**
     * Notification status
     */
    'notification' => true,
    'notification_limit' => 100 // Notification will only appear as many as 100 data

    
  ];
