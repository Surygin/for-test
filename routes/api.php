<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CategoryControler;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\LikeController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\UserController;
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
//Route::resource('posts', PostController::class);

Route::resource('categories', CategoryControler::class);
Route::resource('tags', TagController::class);
Route::resource('comments', CommentController::class);
Route::resource('roles', RoleController::class);
Route::resource('comments', ProfileController::class);
Route::resource('users', UserController::class);
Route::resource('profiles', ProfileController::class);

Route::patch('likes/posts/{post}', [LikeController::class, 'toggleLikePost'])->name('likeTogglePost');
