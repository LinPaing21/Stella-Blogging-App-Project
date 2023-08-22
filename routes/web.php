<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [ArticleController::class, 'index'])->name('home');

Route::get('/articles', [ArticleController::class, 'index']);

Route::get('/articles/{article:slug}', [ArticleController::class, 'show']);

Route::get('/categories/{category:slug}', [ArticleController::class, 'category']);

Route::get('/users/{user:username}', [ArticleController::class, 'user']);
