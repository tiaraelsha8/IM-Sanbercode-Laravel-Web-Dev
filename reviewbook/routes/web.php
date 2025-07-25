<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FormController;

use App\Http\Controllers\GenreController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsAdmin;

Route::get('/', [DashboardController::class, 'index']);
Route::get('/register', [FormController::class, 'register']);
Route::post('/welcome', [FormController::class, 'signup']);

Route::get('/master', function() {
 return view ('layout.master');
});

Route::middleware(['auth', IsAdmin::class])->group(function (){
    //create data genre
    Route::get('/genre/create', [GenreController::class, 'create']);
    Route::post('/genre', [GenreController::class, 'store']);

    // update data
    Route::get('/genre/{id}/edit', [GenreController::class, 'edit']);
    Route::put('/genre/{id}', [GenreController::class, 'update']);

    // delete
    Route::delete('/genre/{id}', [GenreController::class, 'destroy']);

    Route::get('/user', [UserController::class, 'edit']);
    Route::put('/user', [UserController::class, 'update']);

});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');
Route::get('/profile', [AuthController::class, 'getprofile'])->middleware('auth');
Route::post('/profile', [AuthController::class, 'createProfile'])->middleware('auth');
Route::put('/profile/{id}', [AuthController::class, 'updateProfile'])->middleware('auth');

Route::post('/comments/{book_id}', [CommentController::class, 'store'])->middleware('auth');

// read data
Route::get('/genre', [GenreController::class, 'index']);
Route::get('/genre/{id}', [GenreController::class, 'show']);

//CRUD Book
Route::resource('/book', BookController::class);

//auth
//regiter
Route::get('/register', [AuthController::class, 'showregister']);
Route::post('/register', [AuthController::class, 'registeruser']);

//login
Route::get('/login', [AuthController::class, 'showlogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);



