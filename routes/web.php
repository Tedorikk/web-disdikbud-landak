<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleManagementController;
use App\Http\Controllers\MenuController;

Route::get('/', [HomeController::class, 'index'])->name('welcome');

Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/{id}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('articles/{article}', [ArticleController::class, 'show'])->name('articles.show');

Route::get('/dashboard', function () {
    return view('admin/dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/menu', function () {
    return view('admin/menu');
})->middleware(['auth', 'verified'])->name('menu');

Route::get('/managedata', function () {
    return view('admin/managedata');
})->middleware(['auth', 'verified'])->name('managedata');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/managearticle', [ArticleManagementController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('managearticle');
Route::get('/admin/articles/create', [ArticleManagementController::class, 'create'])->name('articles.create');
Route::post('/admin/articles', [ArticleManagementController::class, 'store'])->name('articles.store');
Route::get('/admin/articles/{id}/edit', [ArticleManagementController::class, 'edit'])->name('articles.edit');
Route::put('/admin/articles/{id}', [ArticleManagementController::class, 'update'])->name('articles.update');
Route::delete('/admin/articles/{id}', [ArticleManagementController::class, 'destroy'])->name('articles.destroy');

require __DIR__.'/auth.php';

Route::get('/page/{slug}', [MenuController::class, 'show'])->name('page.show');

Route::prefix('admin')->group(function () {
    Route::get('menus', [MenuController::class, 'index'])->name('admin.menus.index');
    Route::post('menus', [MenuController::class, 'store'])->name('admin.menus.store');
    Route::put('menus/{menu}', [MenuController::class, 'update'])->name('admin.menus.update');
    Route::delete('menus/{menu}', [MenuController::class, 'destroy'])->name('admin.menus.destroy');
});