<?php

use Illuminate\Support\Facades\Route;

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

Route::any('category/create', [App\Http\Controllers\CategoryController::class, 'createCategory'])->name('createCategory');
Route::any('category/edit/{id?}', [App\Http\Controllers\CategoryController::class, 'editCategory'])->name('editCategory');
Route::any('category/delete/{id?}', [App\Http\Controllers\CategoryController::class, 'deleteCategory'])->name('deleteCategory');
