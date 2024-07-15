<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::post('/home', [HomeController::class, 'store'])->name('home.store');
Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::get('/profile/comment/{post}', [ProfileController::class, 'comment'])->name('posts.comment');
Route::get('/profile/{post}', [ProfileController::class, 'Like'])->name('posts.like');
//Route::delete('/profile',[ProfileController::class, 'destroy'])->name('posts.destroy');
Route::delete('/profile/{post}',[ProfileController::class, 'destroy'])->name('posts.destroy');
Route::get('/profile/edit/{post}', [ProfileController::class, 'edit'])->name('posts.edit');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::put('/profile/posts/{post}', [ProfileController::class, 'update'])->name('posts.update');


