<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::group(['prefix' => 'v1', 'middleware' => 'auth:sanctum'], function () {
    Route::apiResources([
        'parkings' => 'ParkingController'
    ]);
});


Route::group(['prefix' => 'auth'], function () {
    Route::post('login', [LoginController::class, 'index']);
    Route::delete('logout', [LogoutController::class, 'index']);
});


