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


// Product--------------------------
// Read
Route::get('dashboard/product', [App\Http\Controllers\Admin\Product::class, 'index'])->name('dashboard.product');
// Create
Route::get('dashboard/product/add', [App\Http\Controllers\Admin\Product::class, 'add'])->name('dashboard.product.add');
Route::post('dashboard/product/create', [App\Http\Controllers\Admin\Product::class, 'create'])->name('dashboard.product.create');
// Edit
Route::get('dashboard/product/{id}/edit', [App\Http\Controllers\Admin\Product::class, 'edit'])->name('dashboard.product.edit');
Route::post('dashboard/product/update', [App\Http\Controllers\Admin\Product::class, 'update'])->name('dashboard.product.update');
// Delete
Route::get('dashboard/product/{id}/destory', [App\Http\Controllers\Admin\Product::class, 'destroy'])->name('dashboard.product.destroy');

// Catagory --------------------
Route::get('dashboard/catagory', [App\Http\Controllers\Admin\Catagory::class, 'index'])->name('dashboard.catagory');

// User --------------------
Route::get('dashboard/user', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('dashboard.User');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
