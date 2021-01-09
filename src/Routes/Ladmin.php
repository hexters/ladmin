<?php 

namespace Hexters\Ladmin\Routes;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route as BaseRoute;
use Hexters\Ladmin\Http\Middleware\LadminLoginMiddleware;

use App\Http\Controllers\Administrator\DashboardController;
use App\Http\Controllers\Administrator\ProfileController;
use App\Http\Controllers\Administrator\UserAdminController;
use App\Http\Controllers\Administrator\RoleController;
use App\Http\Controllers\Administrator\PermissionController;

use Hexters\Ladmin\Http\Controllers\LogController;
use Hexters\Ladmin\Http\Controllers\NotificationController;
use Hexters\Ladmin\Http\Controllers\LadminLogableController;


class Ladmin {

  public static function route(Closure $function) {
    
    BaseRoute::group([ 
      'prefix' => config('ladmin.prefix', 'administrator'),
      'as' => 'administrator.'
    ], function() use ($function) {
      
      BaseRoute::group([
        'namespace' => 'App\Http\Controllers\Administrator',
      ], function() {
        Auth::routes([ 'register' => false ]);
      });
      
      BaseRoute::group([
        'middleware' => [ LadminLoginMiddleware::class ],
      ], function() use ($function) {
  
        BaseRoute::resource('/', DashboardController::class)->only(['index']);
        BaseRoute::resource('/notification', NotificationController::class)->only(['index', 'show', 'store']);
        BaseRoute::resource('/profile', ProfileController::class)->only(['index', 'store']);

        BaseRoute::group(['as' => 'account.', 'prefix' => 'account'], function() {
          BaseRoute::resource('/admin', UserAdminController::class);
        });

        BaseRoute::group(['as' => 'system.', 'prefix' => 'system'], function() {
          BaseRoute::resource('/log', LogController::class)->only(['index']);
          BaseRoute::resource('/activity', LadminLogableController::class)->only(['index', 'destroy']);
        });

        BaseRoute::group(['as' => 'access.', 'prefix' => 'access'], function() {
          BaseRoute::resource('/role', RoleController::class);
          BaseRoute::resource('/permission', PermissionController::class)->only(['index', 'show', 'update']);
        });

        return $function();
  
      });
    });
  }

}
