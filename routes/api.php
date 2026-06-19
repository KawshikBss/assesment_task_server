<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/test', function (Request $request) {
    return response()->json('test');
});

Route::group(['prefix' => 'auth'], function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/user', [AuthController::class, 'user'])->middleware('auth:sanctum');
    Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
});
