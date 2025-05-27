<?php

use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/users', [UserController::class, 'index']);

Route::resource('/posts', PostController::class, ['except' => ['create', 'edit']]);
