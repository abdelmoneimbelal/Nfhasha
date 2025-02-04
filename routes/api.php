<?php

use App\Http\Controllers\API\Auth\InfoController;
use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Auth\RegisterController;
use App\Http\Controllers\API\HomeSlidersController;
use App\Http\Controllers\API\ServicesController;
use App\Http\Controllers\API\SplashScreensController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('splash-screens' , [SplashScreensController::class, 'index']);
Route::get('home-sliders' , HomeSlidersController::class);
Route::get('services' , ServicesController::class);


Route::group(['prefix' => 'auth'], function () {
    Route::group(['prefix' => 'login'], function () {
        Route::post('user', [LoginController::class, 'user']);
        Route::post('provider', [LoginController::class, 'provider']);
    });

    Route::group(['prefix' => 'register'], function () {
        Route::post('user', [RegisterController::class, 'user']);
        Route::post('provider', [RegisterController::class, 'provider'])->name('register.provider');
        Route::post('verify', [RegisterController::class, 'verify']);
        Route::post('send-otp', [RegisterController::class, 'sendOtp']);
        Route::post('resend-otp', [RegisterController::class, 'resendOtp']);
    });
});



Route::get('cities' , [InfoController::class, 'cities']);
Route::get('districts/{city}' , [InfoController::class, 'districts']);
Route::get('pickup-trucks' , [InfoController::class, 'pickupTrucks']);
