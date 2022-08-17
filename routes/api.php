<?php

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


Route::group(['namespace' => 'Auth\\'], function () {
    Route::post('login', 'LoginController@index');
    Route::post('logout', 'LogoutController@index');
});

Route::group(['middleware' => ['jwt.verify']], function () {

    Route::apiResources([
        'parkings' => 'ParkingController'
    ]);

    Route::post('refresh-token', 'Auth\\RefreshTokenController@index');
});
