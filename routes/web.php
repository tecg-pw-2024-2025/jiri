<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\JiriController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

//Home
Route::get('/', [JiriController::class, 'index'])->name('home');

//Jiris
//Read
Route::get('/jiris', [JiriController::class, 'index'])->name('jiris.index');
Route::get('/jiris/create', [JiriController::class, 'create'])->name('jiris.create');
Route::get('/jiris/{jiri}', [JiriController::class, 'show'])->name('jiris.show');
Route::get('/jiris/{jiri}/edit', [JiriController::class, 'edit'])->name('jiris.edit');
//Create, Update, Delete
Route::post('/jiris', [JiriController::class, 'store'])->name('jiris.store');
Route::patch('/jiris/{jiri}', [JiriController::class, 'update'])->name('jiris.update');
Route::delete('/jiris/{jiri}', [JiriController::class, 'destroy'])->name('jiris.destroy');


//Contacts
//Read
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::get('/contacts/create', [ContactController::class, 'create'])->name('contacts.create');
Route::get('/contacts/{contact}', [ContactController::class, 'show'])->name('contacts.show');
Route::get('/contacts/{contact}/edit', [ContactController::class, 'edit'])->name('contacts.edit');
//Create, Update, Delete
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');
Route::patch('/contacts/{contact}', [ContactController::class, 'update'])->name('contacts.update');
Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('contacts.destroy');


//Projects
//Read
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/create', [ProjectController::class, 'create'])->name('projects.create');
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show');
Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
//Create, Update, Delete
Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
Route::patch('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
