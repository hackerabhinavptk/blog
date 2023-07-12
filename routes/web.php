<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\PostController;
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



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/posts', [App\Http\Controllers\HomeController::class, 'posts']);

Route::get('/blog_form', [PostController::class, 'form']);

Route::post('/form', [PostController::class, 'add']);

Route::get('/post/{id?}', [PostController::class, 'detail']);


Route::post('/comment', [PostController::class, 'comment_post']);

Route::get('/logout', [PostController::class, 'Logout']);



