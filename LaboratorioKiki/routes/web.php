<?php

use App\Http\Controllers\ExameController;
use App\Http\Controllers\RegistroExameController;
use Illuminate\Support\Facades\Route;

Route::get('/', [RegistroExameController::class, 'listarTodos'])->name('exames.listarTodos');
Route::get('/form', function () {
    return view('form');
})->name('exames.form');
Route::post('/store', [RegistroExameController::class, 'salvarNovo'])->name('exames.store');
