<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\CategoryControler;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsAdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login']);
Route::group([], function () {
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class. 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
})->middleware([
    'jwt.auth',
    IsAdminMiddleware::class
]);

//Route::group(['middleware' => 'jwt.auth'],function (){
//
//})->middleware([
//    IsAdminMiddleware::class
//]);

Route::resource('posts', PostController::class)->middleware([
    'jwt.auth',
    IsAdminMiddleware::class
]);

Route::resource('categories', CategoryControler::class);
Route::resource('tags', TagController::class);
Route::resource('comments', CommentController::class);
Route::resource('roles', RoleController::class);
Route::resource('comments', ProfileController::class);
Route::resource('users', UserController::class);
Route::resource('profiles', ProfileController::class);

Route::patch('likes/posts/{post}', [LikeController::class, 'toggleLikePost'])->name('likeTogglePost');
