<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

// Default page - use posts.create as the name
Route::get('/', [PostController::class, 'create'])->name('posts.create');

// Form submission
Route::post('/submit-post', [PostController::class, 'store'])->name('posts.store');