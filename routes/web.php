<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Middleware\IsAdminMiddleware;
use Illuminate\Support\Facades\Route;

//Route::get('/', [MainController::class, 'index'])->name('dashboard');
//Route::resource('/posts', PostController::class);
//Route::resource('/categories', CategoryController::class);
//Route::resource('/tags', TagController::class);

Route::group(['middleware' => ['auth', IsAdminMiddleware::class]], function (){
    Route::get('/', [MainController::class, 'index'])->name('dashboard');
    Route::resource('/posts', PostController::class);
    Route::resource('/categories', CategoryController::class);
    Route::resource('/tags', TagController::class);
});

require __DIR__.'/auth.php';
