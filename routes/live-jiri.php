<?php

use App\Http\Controllers\LiveJiriController;


//Jiris
//Read
Route::get('/live-jiri/{jiri}/{token}', [LiveJiriController::class, 'show'])
    ->name('live-jiri.show');

//Create, Update, Delete
Route::post('/live-jiri', [LiveJiriController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('live-jiri.store');
