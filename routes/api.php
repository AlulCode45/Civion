<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware(\App\Http\Middleware\AdminMiddleware::class)->group(function () {

});
Route::middleware(\App\Http\Middleware\MemberMiddleware::class)->group(function () {

});
Route::middleware(\App\Http\Middleware\GovermentMiddleware::class)->group(function () {

});
