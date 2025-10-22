<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/insert', [HomeController::class, 'create'])->name('home.create');
Route::post('/insert', [HomeController::class, 'store'])->name('home.store');