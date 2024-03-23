<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


Route::get('/show', [\App\Http\Controllers\ProductController::class, 'show'])->name('show');
Route::get('/', function () { return view('welcome');});

Route::get('/create', function () { return view('create'); })->name('create');
Route::post('/product', [\App\Http\Controllers\ProductController::class, 'add'])->name('product.add');

Route::get('/update', function () { return view('update'); })->name('update');
Route::get('/update/{id}', [\App\Http\Controllers\ProductController::class, 'update'])->name('product.update');
Route::post('/update', [\App\Http\Controllers\ProductController::class, 'update'])->name('product.update');

Route::get('/delete/{id}', [\App\Http\Controllers\ProductController::class, 'remove'])->name('product.remove');

Route::get('/create_category', [\App\Http\Controllers\CategoryController::class, 'create_category'])->name('cat');
Route::post('/create_category', [\App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
Route::get('/create_category/{id}', [\App\Http\Controllers\CategoryController::class, 'catch_id'])->name('product.update');
Route::post('/categoryproduct', [\App\Http\Controllers\CategoryController::class, 'catch_category_to_product'])->name('product.catprod');

Route::get('/create_specification', [\App\Http\Controllers\SpecificationController::class, 'create_specification'])->name('specproduct');
Route::post('/specification_product_create', [\App\Http\Controllers\SpecificationController::class, 'create'])->name('spec.create');
Route::get('/create_specification/{id}', [\App\Http\Controllers\SpecificationController::class, 'catch_id'])->name('specification');
Route::post('/specification_product/{id}', [\App\Http\Controllers\SpecificationController::class, 'catch_specification_to_product'])->name('specproduct');

Route::get('/catalog', [\App\Http\Controllers\CategoryController::class, 'allCategory']);
Route::get('/catalog/{id}', [\App\Http\Controllers\CategoryController::class, 'subcategories']);
Route::get('/products/{id}', [\App\Http\Controllers\CategoryController::class, 'products']);
