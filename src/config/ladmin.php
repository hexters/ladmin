<?php 

  return [
    
    /**
     * Url image logo
     */
    'logo' => env('LADMIN_LOGO', null),
    
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
