<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::post('/search', [HomeController::class, 'search'])->name('search');

Route::post('/filter', [HomeController::class, 'filterSearch'])->name('filter');

Route::post('/next', [HomeController::class, 'nextPage'])->name('next');