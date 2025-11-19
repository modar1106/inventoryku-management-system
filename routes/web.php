<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InventoryTransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('suppliers', SupplierController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::get('/stock-in', [InventoryTransactionController::class, 'createStockIn'])->name('transactions.stockIn');
    Route::post('/stock-in', [InventoryTransactionController::class, 'storeStockIn'])->name('transactions.storeStockIn');
    Route::get('/stock-out', [InventoryTransactionController::class, 'createStockOut'])->name('transactions.stockOut');
    Route::post('/stock-out', [InventoryTransactionController::class, 'storeStockOut'])->name('transactions.storeStockOut');
    Route::get('/transactions', [InventoryTransactionController::class, 'index'])->name('transactions.index');
});

require __DIR__.'/auth.php';
