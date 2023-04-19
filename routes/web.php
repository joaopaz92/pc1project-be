<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TrademarkController;
use App\Http\Controllers\TrademarkModelController;
use App\Http\Controllers\ProductController;


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
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::controller(CategoryController::class)->group(function () {
    Route::get('categories', 'index')->name('categories-index');
    Route::get('category/create', 'create')->name('category-create');
    Route::post('categories', 'store')->name('category-add');
    Route::get('category/{id}', 'show')->name('category.show');
    Route::post('category/update/{id}', 'update')->name('category-update');
    Route::delete('category/delete/{id}', 'destroy')->name('categories.destroy');
});

Route::controller(TrademarkController::class)->group(function () {
    Route::get('trademarks', 'index')->name('trademarks-index');
    Route::get('trademark/create', 'create')->name('trademark-create');
    Route::post('trademarks', 'store')->name('trademark-add');
    Route::get('trademark/{id}', 'show')->name('trademark.show');
    Route::post('trademark/update/{id}', 'update')->name('trademark-update');
    Route::delete('trademark/delete/{id}', 'destroy')->name('trademarks.destroy');
});

Route::controller(TrademarkModelController::class)->group(function () {
    Route::get('trademarkmodels', 'index')->name('trademarkmodels-index');
    Route::get('trademarkmodel/create', 'create')->name('trademarkmodel-create');
    Route::post('trademarkmodels', 'store')->name('trademarkmodel-add');
    Route::get('trademarkmodel/{id}', 'show')->name('trademarkmodel.show');
    Route::post('trademarkmodel/update/{id}', 'update')->name('trademarkmodel-update');
    Route::delete('trademarkmodel/delete/{id}', 'destroy')->name('trademarkmodels.destroy');
});

Route::controller(ProductController::class)->group(function () {
    Route::get('products', 'index')->name('products-index');
    Route::get('product/create', 'create')->name('product-create');
    Route::post('products', 'store')->name('product-add');
    Route::get('product/{id}', 'show')->name('product.show');
    Route::post('product/update/{id}', 'update')->name('product-update');
    Route::delete('product/delete/{id}', 'destroy')->name('products.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
