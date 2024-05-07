<?php

use App\Http\Controllers\CategoryControler;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('posts', PostController::class);
Route::resource('categories', CategoryControler::class);
Route::resource('tags', TagController::class);
Route::resource('comments', CommentController::class);
Route::resource('roles', RoleController::class);
Route::resource('comments', ProfileController::class);
Route::resource('users', UserController::class);
Route::resource('profiles', ProfileController::class);
