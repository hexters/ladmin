<?php 

namespace Hexters\Ladmin\Routes;

use Illuminate\Support\Facades\Route as BaseRoute;
use Hexters\Ladmin\Http\Middleware\LadminLoginMiddleware;

class Ladmin {

  public static  function route($func) {
    BaseRoute::group([ 
      'prefix' => 'administrator',
      'namespace' => 'Hexters\\Ladmin\\Http\\Controllers',
      'as' => 'administrator.'
    ], function() {
      BaseRoute::resource('/login', 'Auth\LoginController')->only(['index', 'store']);
      BaseRoute::group([
        'middleware' => [ LadminLoginMiddleware::class ],
      ], function() {
  
        BaseRoute::resource('/', 'HomeController')->only(['index']);

        $func;
  
      });
    });
  }

}