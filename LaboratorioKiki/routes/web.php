<?php

use App\Http\Controllers\ExameController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ExameController::class, 'index'])->name('exames.index');
Route::get('/form', function () {
    return view('form');
})->name('exames.form');
Route::post('/store', [ExameController::class, 'store'])->name('exames.store');
