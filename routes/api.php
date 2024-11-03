<?php

use App\Http\Controllers\Category\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('auth/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
});

Route::middleware('auth:sanctum')->group(function () {

    Route::middleware(\App\Http\Middleware\AdminMiddleware::class)->group(function () {
        Route::resource('/category', \App\Http\Controllers\Category\CategoryController::class);
    });
    Route::middleware(\App\Http\Middleware\MemberMiddleware::class)->group(function () {

    });
    Route::middleware(\App\Http\Middleware\GovermentMiddleware::class)->group(function () {

    });

});
