<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LottoPageController;
use App\Http\Controllers\LottoController;

use App\Http\Controllers\SlotGameController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/web/lotto/{lang}', [LottoPageController::class, 'index']);
Route::get('/news', [LottoController::class, 'fetchNews']);

Route::get('/web/th/lotto/{lang}', [LottoPageController::class, 'index_th']);

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
});


Route::get('/contact', function () {
    return view('huay24online-contact');
});


Route::get('/app/contact', function () {
    return view('huayonline-contact');
});
//ติดต่อเรา 123 betting trips
Route::get('/app/123/contact', function () {
    return view('123bettingtrips-contact');
});



//สำหรับ viewview
Route::get('/app-show', function () {
    return view('app-show');
});
Route::get('/huaybee', function () {
    return view('huaybee');
});




//ผลบอลสด
Route::get('/soccer/scoreAPI', function () {
    return view('soccer.scoreAPI');
});

