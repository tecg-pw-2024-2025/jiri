<?php

use App\Http\Controllers\JiriController;

Route::middleware(['auth', 'verified'])->group(function () {
    //Jiris
    //Read
    Route::get('/jiris', [JiriController::class, 'index'])
        ->name('jiris.index');
    Route::get('/jiris/create', [JiriController::class, 'create'])
        ->name('jiris.create');
    Route::get('/jiris/{jiri}', [JiriController::class, 'show'])
        ->can('view', 'jiri')
        ->name('jiris.show');
    Route::get('/jiris/{jiri}/edit', [JiriController::class, 'edit'])
        ->can('update', 'jiri')
        ->name('jiris.edit');
    //Create, Update, Delete
    Route::post('/jiris', [JiriController::class, 'store'])
        ->name('jiris.store');
    Route::patch('/jiris/{jiri}', [JiriController::class, 'update'])
        ->can('update', 'jiri')
        ->name('jiris.update');
    Route::delete('/jiris/{jiri}', [JiriController::class, 'destroy'])
        ->can('delete', 'jiri')
        ->name('jiris.destroy');
});
