<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;

use App\Http\Controllers\GenreController;

Route::get('/', [DashboardController::class, 'index']);
Route::get('/register', [FormController::class, 'register']);
Route::post('/welcome', [FormController::class, 'signup']);

Route::get('/master', function() {
 return view ('layout.master');
});

//create data genre
Route::get('/genre/create', [GenreController::class, 'create']);
Route::post('/genre', [GenreController::class, 'store']);

// read data
Route::get('/genre', [GenreController::class, 'index']);
Route::get('/genre/{id}', [GenreController::class, 'show']);

// update data
Route::get('/genre/{id}/edit', [GenreController::class, 'edit']);
Route::put('/genre/{id}', [GenreController::class, 'update']);

// delete
Route::delete('/genre/{id}', [GenreController::class, 'destroy']);


