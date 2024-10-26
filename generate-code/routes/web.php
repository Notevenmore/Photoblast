<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\CodeController::class, 'index'])->name('home');
Route::post('/makecode', [App\Http\Controllers\CodeController::class, 'store'])->name('makeCode');