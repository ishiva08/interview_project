<?php

use App\Http\Controllers\ProductController;
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

Route::get('/', [ProductController::class, 'index'])->name('products');
Route::get('/create-product', [ProductController::class, 'create'])->name('create-product');
Route::post('/', [ProductController::class, 'store'])->name('store-product');
Route::get('/{product}', [ProductController::class, 'show'])->name('show-product');
Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('edit-product');
Route::put('/{product}/update', [ProductController::class, 'update'])->name('update-product');
Route::delete('/{product}', [ProductController::class, 'destroy'])->name('delete-product');

Route::post('/{product}', [ProductController::class, 'store'])->name('store-product');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
