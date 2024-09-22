<?php

use App\Http\Controllers\JiriController;
use Illuminate\Support\Facades\Route;

Route::get('/', [JiriController::class, 'index'])->name('home');
Route::get('/jiris', [JiriController::class, 'index'])->name('jiris.index');
Route::post('/jiris', [JiriController::class, 'store'])->name('jiris.store');
Route::get('/jiris/create', [JiriController::class, 'create'])->name('jiris.create');
Route::get('/jiris/{id}', [JiriController::class, 'show'])->name('jiris.show');
