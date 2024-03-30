<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\TweetsController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class,'index'])->name('/');
Route::get('/logout', [LogoutController::class, 'index'])->name('logout');
Route::get('/about', [AboutController::class, 'index']);

Route::group(['middleware' => 'guest'], function () {
    Route::get('/signup', [SignUpController::class, 'index'])->name('signup');
    Route::post('/signup', [SignUpController::class, 'store'])->name('signup');
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
});

Route::get('/tweets', [TweetsController::class,'index'])->name('tweets');
Route::post('/tweets', [TweetsController::class,'makeTweet'])->name('tweets');

