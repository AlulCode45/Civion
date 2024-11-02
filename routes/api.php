<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
});

Route::middleware(\App\Http\Middleware\AdminMiddleware::class)->group(function () {

});
Route::middleware(\App\Http\Middleware\MemberMiddleware::class)->group(function () {

});
Route::middleware(\App\Http\Middleware\GovermentMiddleware::class)->group(function () {

});