<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/', [\App\Http\Controllers\Auth\LoginController::class, 'login']);

