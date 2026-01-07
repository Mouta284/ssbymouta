<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoryController;

Route::get('/', [StoryController::class, 'index'])->name('index.story');
Route::get('/story/{id}', [StoryController::class, 'show'])->name('show.story');