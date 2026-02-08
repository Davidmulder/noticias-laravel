<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', [NewsController::class, 'index'])->name('news.index'); // pagina inicial
Route::get('/noticias/{news}', [NewsController::class, 'show'])->name('news.show');
