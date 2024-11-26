<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PlanAccionComunalController;
use Illuminate\Http\Request;
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

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function () {
    Route::post('loginEmail', [AuthController::class, 'loginEmail']);
    Route::group([
        'middleware' => 'auth:api'
    ], function () {
        Route::get('refreshToken', [AuthController::class, 'refreshToken']);
        Route::get('getUserAutheticated', [AuthController::class, 'getUserAutheticated']);
        Route::get('logout', [AuthController::class, 'logout']);
    });
});

Route::group([
    'middleware' => 'api',
    'middleware' => 'auth:api',
], function ($router) {
    Route::group([
        'prefix' => 'planAccionComunal'
    ], function ($router) {
        Route::post('store',  [PlanAccionComunalController::class, 'store']);
    });
});
