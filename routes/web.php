<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SpecificationController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Product;
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


Route::get('/show', [ProductController::class, 'show'])->name('show');
Route::get('/', [CategoryController::class,'allCategory'])->name('main');  ;

Route::get('/create', [ProductController::class, 'create_product'] )->name('create');
Route::post('/product', [ProductController::class, 'add'])->name('product.add');

Route::get('/update', function () { return view('update'); })->name('update');
Route::get('/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::post('/update', [ProductController::class, 'update'])->name('product.update');

Route::get('/delete/{id}', [ProductController::class, 'remove'])->name('product.remove');

Route::get('/create_category', [CategoryController::class, 'create_category'])->name('cat');
Route::post('/create_category', [CategoryController::class, 'create'])->name('category.create');
Route::get('/create_category/{id}', [CategoryController::class, 'catch_id'])->name('product.update');
Route::post('/categoryproduct', [CategoryController::class, 'catch_category_to_product'])->name('product.catprod');

Route::get('/create_specification', [SpecificationController::class, 'create_specification'])->name('specproduct');
Route::post('/specification_product_create', [SpecificationController::class, 'create'])->name('spec.create');
Route::get('/create_specification/{id}', [SpecificationController::class, 'catch_id'])->name('specification');
Route::post('/specification_product/{id}', [SpecificationController::class, 'catch_specification_to_product'])->name('specproduct');

Route::get('/catalog', [CategoryController::class, 'allCategory']);
Route::get('/catalog/{id}', [CategoryController::class, 'subcategories']);
Route::get('/products/{id}', [CategoryController::class, 'products']);




