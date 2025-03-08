<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LottoController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware(\App\Http\Middleware\ApiAuthMiddleware::class)->group(function () {
    Route::get('/latest-lotto', [LottoController::class, 'getLotteryLastData']);
    Route::get('/history-lotto', [LottoController::class, 'getLotteryData']);
    Route::get('/setting', [LottoController::class, 'getSetting']);
    Route::get('/news', [LottoController::class, 'fetchNews']);
    Route::post('/device-token', [LottoController::class, 'device_token']);
});