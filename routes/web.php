<?php

use App\Http\Controllers\CategoryControler;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/testPost', [TestController::class, 'test']);
Route::post('/testPost', [TestController::class, 'testPost']);

//Route::resource('posts', PostController::class);
//
////Route::prefix('posts')->group(function (){
////    Route::get('/index',[PostController::class, 'index']);
////    Route::get('/show/{post}',[PostController::class, 'show']);
////    Route::get('/store',[PostController::class, 'store']);
////    Route::get('/update/{post}',[PostController::class, 'update']);
////    Route::get('/destroy/{post}',[PostController::class, 'destroy']);
////});
//
//Route::prefix('categories')->group(function (){
//    Route::get('/index',[CategoryControler::class, 'index']);
//    Route::get('/show/{category}',[CategoryControler::class, 'show']);
//    Route::get('/store',[CategoryControler::class, 'store']);
//    Route::get('/update/{category}',[CategoryControler::class, 'update']);
//    Route::get('/destroy/{category}',[CategoryControler::class, 'destroy']);
//});
//
//Route::prefix('tags')->group(function (){
//    Route::get('/index',[TagController::class, 'index']);
//    Route::get('/show/{tag}',[TagController::class, 'show']);
//    Route::get('/store',[TagController::class, 'store']);
//    Route::get('/update/{tag}',[TagController::class, 'update']);
//    Route::get('/destroy/{tag}',[TagController::class, 'destroy']);
//});
//
//Route::prefix('comments')->group(function (){
//    Route::get('/index',[CommentController::class, 'index']);
//    Route::get('/show/{comment}',[CommentController::class, 'show']);
//    Route::get('/store',[CommentController::class, 'store']);
//    Route::get('/update/{comment}',[CommentController::class, 'update']);
//    Route::get('/destroy/{comment}',[CommentController::class, 'destroy']);
//});
//
//Route::prefix('roles')->group(function (){
//    Route::get('/index',[RoleController::class, 'index']);
//    Route::get('/show/{role}',[RoleController::class, 'show']);
//    Route::get('/store',[RoleController::class, 'store']);
//    Route::get('/update/{role}',[RoleController::class, 'update']);
//    Route::get('/destroy/{role}',[RoleController::class, 'destroy']);
//});
//
//Route::prefix('profiles')->group(function (){
//    Route::get('/index',[ProfileController::class, 'index']);
//    Route::get('/show/{profile}',[ProfileController::class, 'show']);
//    Route::get('/store',[ProfileController::class, 'store']);
//    Route::get('/update/{profile}',[ProfileController::class, 'update']);
//    Route::get('/destroy/{profile}',[ProfileController::class, 'destroy']);
//});
