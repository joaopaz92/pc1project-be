<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\CategoryController;

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

Route::get('/product_type_ops', function () {
    return view('product_type_ops');
});

Route::get('/product_ops', function () {
    return view('product_ops');
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('categories', 'index')->name('categories-index');
    Route::get('category/create', 'create')->name('category-create');
    Route::post('categories', 'store')->name('category-add');
    Route::get('category/{id}', 'show')->name('category.show');
    Route::post('category/update/{id}', 'update')->name('category-update');
    Route::delete('category/delete/{id}', 'destroy')->name('categories.destroy');
});

// Route::controller(ProductTypeController::class)->group(function () {

//     Route::get('product_type/create', 'create')->name('product_type.create');
//     Route::post('product_types', 'store')->name('product_types-add');
//     Route::get('product_types', 'index')->name('product_types-index');
//     Route::get('product_type/{id}', 'show');
//     Route::post('product_type', 'store');
// });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
