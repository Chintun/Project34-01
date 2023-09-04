<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('dashboard/product', [App\Http\Controllers\Admin\Product::class, 'index'])->name('dashboard.product');



// Product--------------------------
// Read
Route::get('dashboard/product', [App\Http\Controllers\Admin\Product::class, 'index'])->name('dashboard.product');
// Create
Route::get('dashboard/product/add', [App\Http\Controllers\Admin\Product::class, 'add'])->name('dashboard.product.add');
Route::post('dashboard/product/create', [App\Http\Controllers\Admin\Product::class, 'create'])->name('dashboard.product.create');
// Edit
Route::get('dashboard/product/edit/{id}', [App\Http\Controllers\Admin\Product::class, 'edit'])->name('dashboard.product.edit');
Route::post('dashboard/product/update/{id}', [App\Http\Controllers\Admin\Product::class, 'update']);
// Delete
Route::get('dashboard/product/destory/{id}', [App\Http\Controllers\Admin\Product::class, 'destroy'])->name('dashboard.product.destroy');

// Catagory --------------------
// Read
Route::get('dashboard/category', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('dashboard.category');
// Create
Route::get('dashboard/category/add', [App\Http\Controllers\Admin\CategoryController::class, 'add'])->name('dashboard.category.add');
Route::post('dashboard/category/create', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('dashboard.category.create');
// Edit
Route::get('dashboard/category/edit/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('dashboard.category.edit');
Route::post('dashboard/category/update/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'update']);
// Delete
Route::get('dashboard/category/destory/{id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('dashboard.category.destroy');

// Promotion --------------------
Route::get('dashboard/promotion', [App\Http\Controllers\Admin\PromonController::class, 'index'])->name('dashboard.promotion');
// Create
Route::get('dashboard/promotion/add', [App\Http\Controllers\Admin\PromonController::class, 'add'])->name('dashboard.promotion.add');
Route::post('dashboard/promotion/create', [App\Http\Controllers\Admin\PromonController::class, 'create'])->name('dashboard.promotion.create');
// Edit
Route::get('dashboard/promotion/edit/{id}', [App\Http\Controllers\Admin\PromonController::class, 'edit'])->name('dashboard.promotion.edit');
Route::post('dashboard/promotion/update/{id}', [App\Http\Controllers\Admin\PromonController::class, 'update']);
// Delete
Route::get('dashboard/promotion/destory/{id}', [App\Http\Controllers\Admin\PromonController::class, 'destroy'])->name('dashboard.promotion.destroy');

// User --------------------
Route::get('dashboard/user', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('dashboard.User');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
