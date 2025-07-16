<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;

Route::get('/', [DashboardController::class, 'index']);
Route::get('/register', [FormController::class, 'register']);
Route::post('/welcome', [FormController::class, 'signup']);

Route::get('/master', function() {
 return view ('layout.master');
});
