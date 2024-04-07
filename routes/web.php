<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SpecificationController;
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



Route::get('/', [CategoryController::class,'allCategory'])->name('main');
Route::get('/category/{id}', [CategoryController::class, 'category']);

//Route::get('/show', [ProductController::class, 'show'])->name('show');


Route::get('/create', [ProductController::class, 'create_product'] )->name('create');
Route::post('/product', [ProductController::class, 'add'])->name('product.add');

Route::get('/update', function () { return view('update'); })->name('update');
Route::get('/update/{id}/{categoryId}', [ProductController::class, 'update'])->name('product.update');
Route::post('/update/{categoryId}', [ProductController::class, 'update_product'])->name('product.update');

Route::get('/delete/{id}/{categoryId}', [ProductController::class, 'remove'])->name('product.remove');

Route::get('/create_category', [CategoryController::class, 'create_category'])->name('cat');
Route::post('/create_category', [CategoryController::class, 'create'])->name('category.create');
Route::get('/create_category/{id}', [CategoryController::class, 'catch_id'])->name('product.update');
Route::post('/categoryproduct', [CategoryController::class, 'catch_category_to_product'])->name('product.catprod');

Route::get('/create_specification', [SpecificationController::class, 'create_specification'])->name('specproduct');
Route::post('/specification_product_create', [SpecificationController::class, 'create'])->name('spec.create');
Route::get('/create_specification/{id}/{categoryId}', [SpecificationController::class, 'catch_id'])->name('specification');
Route::post('/specification_product/{id}/{categoryId}', [SpecificationController::class, 'catch_specification_to_product'])->name('specproduct');





