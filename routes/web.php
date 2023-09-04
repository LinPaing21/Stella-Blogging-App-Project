<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
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

Route::post('/articles/{article:slug}/comments', [CommentController::class, 'store'])->middleware('auth');

Route::patch('/articles/{article:slug}/comments/{comment}', [CommentController::class, 'update'])->middleware('auth');

Route::delete('/articles/{article:slug}/comments/{comment}', [CommentController::class, 'destroy'])->middleware('auth');

//author
Route::middleware('checkRole:author,admin')->group(function () {
    Route::resource('/author/articles', ArticleController::class)->except('index', 'show');
});

//admin only
Route::get('/admin', [AdminController::class, 'index'])->middleware('can:admin')->name('admin.dashboard');

Route::patch('/admin/users/{user:username}', [AdminController::class, 'userRole'])->middleware('can:admin')->name('admin.edit');

// Route::patch('/admin/users/{user:username}', [AdminController::class, 'userRole'])->middleware('can:admin')->name('admin.edit');

Route::delete('/admin/users/{user:username}', [AdminController::class, 'userDestroy'])->middleware('can:admin')->name('admin.destroy');

Route::post('/admin/category/add', [AdminController::class, 'addCat'])->middleware('can:admin');

Auth::routes();
