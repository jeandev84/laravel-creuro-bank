<?php

use App\Http\Controllers\Auth\JwtController;
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


Route::prefix('v1')->group(function () {

    Route::get('admin', [\App\Http\Controllers\AdminController::class, 'index']);

    Route::prefix('auth')->group(function () {
          Route::post('login', [JwtController::class, 'login']);
          Route::post('checkToken', [JwtController::class, 'checkToken']);
          Route::post('logout', [JwtController::class, 'logout']);
    });

});
