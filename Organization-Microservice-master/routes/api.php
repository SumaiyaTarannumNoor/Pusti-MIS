<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdministrativeDivisionController;
use App\Http\Controllers\UpazilaController;
use App\Http\Controllers\StorageController;
use App\Http\Controllers\SalesOrganizationController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\DistributionAssignedAreaController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\BankAccountsController;
use App\Http\Controllers\DistributorController;


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

Route::resource('upazilas', UpazilaController::class);
Route::resource('storages', StorageController::class);
Route::resource('salesorganizations', SalesOrganizationController::class);
Route::resource('banks', BankController::class);
Route::resource('distributionassignedareas', DistributionAssignedAreaController::class);
Route::resource('districts', DistrictController::class);
Route::resource('bankaccounts', BankAccountsController::class);
Route::resource('distributors', DistributorController::class);
Route::resource('administrativedivisions', AdministrativeDivisionController::class );

Route::post('/bulk-distributors', [DistributorController::class, 'getDistributorsByIds']);


//Status Change 
Route::get('/administrativedivisionStatusChange/{id}', [AdministrativeDivisionController::class, 'StatusChange']);
Route::get('/districtStatusChange/{id}', [DistrictController::class, 'StatusChange']);
Route::get('/upazilaStatusChange/{id}', [UpazilaController::class, 'StatusChange']);
Route::get('/storageStatusChange/{id}', [StorageController::class, 'StatusChange']);
Route::get('/distributorStatusChange/{id}', [DistributorController::class, 'StatusChange']);
Route::get('/salesorganizationStatusChange/{id}', [SalesOrganizationController::class, 'StatusChange']);
Route::get('/bankStatusChange/{id}', [BankController::class, 'StatusChange']);
Route::get('/bankaccountStatusChange/{id}', [BankAccountsController::class, 'StatusChange']);


