<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cekOngkirController;
use App\Http\Controllers\numberOneController;

Route::post('/', [numberOneController::class, 'loop'])->name('loop');

Route::get('/cek-ongkir', [cekOngkirController::class, 'index'])->name('index');
Route::post('/cek-ongkir', [cekOngkirController::class, 'result'])->name('result');
