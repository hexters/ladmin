<?php 

  return [
    
    /**
     * Url image logo
     */
    'logo' => env('LADMIN_LOGO', 'https://github.com/hexters/ladmin/blob/master/logo.svg?raw=true'),
    
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
    'notification' => true

    
  ];
