<?php

  Route::group([ 
    'prefix' => 'administrator', 
    'namespace' => 'Hexters\\Ladmin\\Http\\Controllers',
    'as' => 'administrator.'
  ], function() {
    Route::resource('/', 'HomeController')->only(['index']);
  });