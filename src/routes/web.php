<?php

use Hexters\Ladmin\Http\Middleware\LadminLoginMiddleware;

Route::group([ 
    'prefix' => 'administrator',
    'namespace' => 'Hexters\\Ladmin\\Http\\Controllers',
    'as' => 'administrator.'
  ], function() {
    Route::resource('/login', 'Auth\LoginController')->only(['index', 'store']);
    Route::group([
      'middleware' => [ LadminLoginMiddleware::class ],
    ], function() {

      Route::resource('/', 'HomeController')->only(['index']);

    });
  });