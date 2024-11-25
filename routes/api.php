<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function () {
    Route::post('loginEmail', [AuthController::class, 'loginEmail']);
    Route::post('loginIdentification', [AuthController::class, 'loginIdentification']);
    Route::group([
        'middleware' => 'auth:api'
    ], function () {
        Route::get('refreshToken', [AuthController::class, 'refreshToken']);
        Route::get('getUserAutheticated', [AuthController::class, 'getUserAutheticated']);
        Route::get('logout', [AuthController::class, 'logout']);
    });
});
