<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// show all book 
Route::get('/', [BookController::class, 'index'])->middleware('auth');

// show create form
Route::get('/books/create', [BookController::class, 'create'])->middleware('auth');

// store book data
Route::post('/books', [BookController::class, 'store'])->middleware('auth');;

// edit book data
Route::get('/books/{book}/edit', [BookController::class, 'edit'])->middleware('auth');;

// update edit book data
Route::put('/books/{book}', [BookController::class, 'update'])->middleware('auth');;

// delete book data
Route::delete('/books/{book}', [BookController::class, 'delete'])->middleware('auth');;

// show individual book 
Route::get('/books/{book}', [BookController::class, 'show'])->middleware('auth');;


// registration form
Route::get('/register', [UserController::class, 'register'])->middleware('guest');

// create users
Route::post('/users', [UserController::class, 'store'])->middleware('guest');

// logout
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');;

// login
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

// authenticate login
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
