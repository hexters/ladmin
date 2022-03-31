<?php

use Illuminate\Support\Facades\Route;
use Modules\Ladmin\Http\Controllers\Auth\ForgotPasswordController;
use Modules\Ladmin\Http\Controllers\Auth\LoginController;
use Modules\Ladmin\Http\Controllers\Auth\ResetPasswordController;

Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'attempt'])->name('login.attempt');

Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.form');
Route::post('password/reset', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.send-link-email');

Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/update', [ResetPasswordController::class, 'reset'])->name('password.update');