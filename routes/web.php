<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LottoPageController;
use App\Http\Controllers\LottoController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/web/lotto/{lang}', [LottoPageController::class, 'index']);
Route::get('/news', [LottoController::class, 'fetchNews']);

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
});
