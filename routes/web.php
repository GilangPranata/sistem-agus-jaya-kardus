<?php

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\TransactionHistory;
use App\Http\Controllers\CollectorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\RequestOrderController;
use App\Http\Controllers\TransactionController;

Route::get('/', function () {
    return view('collector.landing-page.index');
});


Route::resource('produk', ProductController::class);

Route::resource('kategori', CategoryController::class);
Route::resource('staff', StaffController::class);
Route::resource('purchase', PurchaseController::class);
Route::resource('sale', SaleController::class);
Route::resource('transaction', TransactionController::class);
Route::resource('pelanggan', CustomerController::class);
Route::resource('dashboard', DashboardController::class);
Route::resource('collector', CollectorController::class);
Route::resource('request-order', RequestOrderController::class);

// Route::get('/transactions/print', [Controller::class, 'printTransactions'])->name('transactions.print');
Route::get('/stock/print', [PdfController::class, 'printDashboard'])->name('stock.print');
Route::get('/transactions/print/{id}', [PdfController::class, 'printTransaction'])->name('transactions.print');


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
