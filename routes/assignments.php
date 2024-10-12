<?php

use App\Http\Controllers\AssignmentController;

Route::middleware(['auth', 'verified'])->group(function () {
    //Attendances
    //Read
    /*    Route::get('/jiris', [JiriController::class, 'index'])
            ->name('jiris.index');
        Route::get('/jiris/create', [JiriController::class, 'create'])
            ->name('jiris.create');
        Route::get('/jiris/{jiri}', [JiriController::class, 'show'])
            ->can('view', 'jiri')
            ->name('jiris.show');
        Route::get('/jiris/{jiri}/edit', [JiriController::class, 'edit'])
            ->can('update', 'jiri')
            ->name('jiris.edit');*/
    //Create, Update, Delete
    /*    Route::post('/jiris', [JiriController::class, 'store'])
            ->name('jiris.store');*/
    /*Route::patch('/assignments/{assignment}', [AssignmentController::class, 'update'])
        ->can('update', 'assignment')
        ->name('assignments.update');*/
    Route::delete('/assignments/{assignment}', [AssignmentController::class, 'destroy'])
        ->can('delete', 'assignment')
        ->name('assignments.destroy');
});
