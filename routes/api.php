<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LottoController;
use App\Http\Controllers\FootballController;
use App\Http\Controllers\SlotGameController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('throttle:15,1')->group(function () {
        Route::middleware(\App\Http\Middleware\ApiAuthMiddleware::class)->group(function () {
            Route::get('/latest-lotto', [LottoController::class, 'getLotteryLastData']);
            Route::get('/history-lotto', [LottoController::class, 'getLotteryData']);
            Route::get('/setting', [LottoController::class, 'getSetting']);
            Route::get('/news', [LottoController::class, 'fetchNews']);
            Route::post('/device-token', [LottoController::class, 'device_token']);

            Route::get('/th/setting', [LottoController::class, 'getSettingTH']);
            Route::get('/th/home', [LottoController::class, 'getSettingTH']);


            Route::get('/th/home', [LottoController::class, 'getSettingTH']);
            Route::get('/th/scan-check', [LottoController::class, 'getScanCheck']);

            Route::get('/slide/banner', [LottoController::class, 'fetchNewsbanner']);

            //สำหรับแอพหวยออนไลน์
            Route::get('/setting/policy/{code}', [LottoController::class, 'getSettinAll']);

               //ใช้สำรหับทำ config ทุกแอพ
            Route::get('/setting/policy/{channel}/{code}', [LottoController::class, 'getSettinProjectAll']);


            //สำหรับแอพ 789 bettting trips
            Route::get('/football/trips/{code}', [FootballController::class, 'index_tips']);
            Route::get('/football/handicap/{code}', [FootballController::class, 'index_handicap']);
            Route::get('/football/fixtures/{code}', [FootballController::class, 'index_fixtures']);
            Route::get('/football/live_scores/{code}', [FootballController::class, 'index_live_scores']);

            //สำหรับแอพ pg slot
            Route::get('/slotgame/winrate/list', [SlotGameController::class, 'index']);
        });
});