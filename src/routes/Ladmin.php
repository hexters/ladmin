<?php 

namespace Hexters\Ladmin\Routes;

use Illuminate\Support\Facades\Route as BaseRoute;

class Ladmin {

  public static  function route($function) {
    BaseRoute::group([ 
      'prefix' => 'administrator',
      'namespace' => 'Administrator',
      'as' => 'administrator.'
    ], function() use ($function) {
      BaseRoute::resource('/login', 'Auth\LoginController')->only(['index', 'store']);
      BaseRoute::group([
        'middleware' => [ 'auth:' . config('ladmin.auth.guard', 'web') ],
      ], function() use ($function) {
  
        BaseRoute::resource('/', 'HomeController')->only(['index']);

        $function();
  
      });
    });
  }

}