<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\UserController;

Route::get('/collection', [StoryController::class, 'index'])->name('index.story');

Route::controller(StoryController::class)->name('story.')->group( function (){
    Route::get('/story/form', 'showUpload')->name('upload');
    Route::post('/story/upload', 'upload')->name('post-upload');
    Route::get('/story/{id}', 'show')->name('show');
});

#Login/Register routes
Route::middleware('guest')->controller(UserController::class)->name('user.')->group( function () {
    Route::get('/login', 'showLogin')->name('login');
    Route::post('/login', 'login')->name('post-login');
    Route::get('/register', 'showRegister')->name('register');
    Route::post('/register', 'register')->name('post-register');
});

Route::middleware('auth')->group( function () {
    Route::post('/logout', [UserController::class, 'logout'])->name('user.logout');
    Route::get('/profile/{id}', [UserController::class, 'show'])->name('user.profile');
});