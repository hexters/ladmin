<?php 

  return [
    
    /**
     * Url image logo
     */
    'logo' => env('LADMIN_LOGO', 'https://github.com/hexters/ladmin/blob/master/logo.svg?raw=true'),

    /**
     * Ladmin prefix page
     */
    'prefix' => env('LADMIN_PREFIX_PAGE', 'administrator'),
    
    /**
     * Admin account Model
     */
    'user' => App\Models\User::class,

    /**
     * Authentication Setting
     */
    'auth' => [
      /**
       * Set the guard to be used during authentication.
       */
      'guard' => 'web',
      
      /**
       * Set the broker to be used during password reset.
       */
      'broker' => 'users' // table name
    ],

    /**
     * Notification status
     */
    'notification' => env('LADMIN_NOTIFICATION', true),
    
    /**
     * Interval deleted log Activity
     */
    'log_activity_life' => 7, // Days

    /**
     * Option cached
     */

     'cache_option' => true
    
  ];
