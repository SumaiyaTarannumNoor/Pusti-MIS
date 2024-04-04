<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\SupplierTypeController;
use App\Http\Controllers\ProductBatchController;
use App\Http\Controllers\StockController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('transactions', TransactionController::class);
Route::resource('supplier_types', SupplierTypeController::class);
Route::resource('product_batches', ProductBatchController::class);
Route::resource('stocks', StockController::class);


//Status Change
Route::get('/transactionStatusChange/{id}', [TransactionController::class, 'StatusChange']);
Route::get('/supplierTypeStatusChange/{id}', [SupplierTypeController::class, 'StatusChange']);
Route::get('/productBatchStatusChange/{id}', [ProductBatchController::class, 'StatusChange']);
Route::get('/stockStatusChange/{id}', [StockController::class, 'StatusChange']);

