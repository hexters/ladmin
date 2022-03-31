<?php

use Hexters\Ladmin\Http\Middleware\AuthMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Ladmin\Http\Controllers\Api\GroupSearchController;

/*
|--------------------------------------------------------------------------
| API Routes Module
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your module. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

ladmin()->routeApi(function () {
    Route::group(['prefix' => '/ladmin/api', 'as' => 'api.'], function () {
        // ...
    });
});
