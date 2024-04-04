<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SecondaryDeliverySummaryController;
use App\Http\Controllers\SecondaryOrderDeliveryHistoryController;
use App\Http\Controllers\SecondaryOrderDeliveryPlanController;
use App\Http\Controllers\DeliveryPlanDetailsController;

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


Route::resource('delivery_summaries', SecondaryDeliverySummaryController::class);
Route::resource('delivery_history', SecondaryOrderDeliveryHistoryController::class);
Route::resource('delivery_plan', SecondaryOrderDeliveryPlanController::class);
Route::resource('delivery_plan_details', DeliveryPlanDetailsController::class);


//Status Change
Route::get('/delivery_summarysStatusChange/{id}', [SecondaryDeliverySummaryController::class, 'StatusChange']);
Route::get('/delivery_historyStatusChange/{id}', [SecondaryOrderDeliveryHistoryController::class, 'StatusChange']);
Route::get('/delivery_planStatusChange/{id}', [SecondaryOrderDeliveryPlanController::class, 'StatusChange']);
Route::get('/delivery_plan_detailsStatusChange/{id}', [DeliveryPlanDetailsController::class, 'StatusChange']);