<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () 
{
    return view('home');
})->name('home');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');


Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/posts', [PostsController::class, 'index'])->name('posts');;
Route::post('/posts', [PostsController::class, 'store']);

Route::post('/posts/{post}/likes', [LikeController::class, 'store'])->name('posts.likes');;
Route::delete('/posts/{post}/likes', [LikeController::class, 'destroy'])->name('posts.likes');;

// Route::post('/posts', [PostsController::class, 'destroy']);
