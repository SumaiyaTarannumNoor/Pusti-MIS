<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommitteeController;
use App\Http\Controllers\CommitteeMemberController;
use App\Http\Controllers\PaymentModeController;
use App\Http\Controllers\PlannedPaymentDetailsController;
use App\Http\Controllers\PrimaryOrderController;
use App\Http\Controllers\PrimaryOrderProductDeliveryPlanController;
use App\Http\Controllers\PrimaryOrderProductDetailsController;

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

Route::resource('committees', CommitteeController::class);
Route::resource('committee_members', CommitteeMemberController::class);
Route::resource('payment_mode', PaymentModeController::class);
Route::resource('planned_payment_details', PlannedPaymentDetailsController::class);
Route::resource('primary_order', PrimaryOrderController::class);
Route::resource('pop_delivery_plan', PrimaryOrderProductDeliveryPlanController::class);
Route::resource('primary_order_product_details', PrimaryOrderProductDetailsController::class);

//Status Change
Route::get('/committeeStatusChange/{id}', [CommitteeController::class, 'StatusChange']);
Route::get('/committee_membersStatusChange/{id}', [CommitteeMemberController::class, 'StatusChange']);
Route::get('/payment_modeStatusChange/{id}', [PaymentModeController::class, 'StatusChange']);
Route::get('/planned_payment_detailsStatusChange/{id}', [PlannedPaymentDetailsController::class, 'StatusChange']);
Route::get('/primary_orderStatusChange/{id}', [PrimaryOrderController::class, 'StatusChange']);
Route::get('/pop_delivery_planStatusChange/{id}', [PrimaryOrderProductDeliveryPlanController::class, 'StatusChange']);
Route::get('/pop_detailsStatusChange/{id}', [PrimaryOrderProductDetailsController::class, 'StatusChange']);

