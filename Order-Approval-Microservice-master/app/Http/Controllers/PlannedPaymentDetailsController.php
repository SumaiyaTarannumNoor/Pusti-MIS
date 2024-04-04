<?php

namespace App\Http\Controllers;

use App\Models\PlannedPaymentDetails;
use Illuminate\Http\Request;

class PlannedPaymentDetailsController extends Controller
{
    public function index()
    {
        $plannedPaymentDetails = PlannedPaymentDetails::with(["paymentMode", "primaryOrder"])->get();

        return response()->json(["status"=>200, "success"=>true, "message"=>"All Planned Payment Details shwing successfully.", "data"=>$plannedPaymentDetails],200);

        $plannedPaymentDetails = $plannedPaymentDetails->map(function ($plannedPaymentDetails) {$plannedPaymentDetails['status'] = (bool) $plannedPaymentDetails['status'];
            return $plannedPaymentDetails;
        });
    }

    public function show($id)
    {
        $plannedPaymentDetails = PlannedPaymentDetails::findOrFail($id);

        return response()->json(["status"=>200, "success"=>true, "message"=>"Planned Payment Details showing successfully.", "data"=>$plannedPaymentDetails],200);

    }

    public function store(Request $request)
    {
        $request->validate([
            'payment_mode_id' => 'required|exists:payment_modes,id',
            'payable_amount' => 'required|numeric',
            'order_id' => 'required|exists:primary_orders,id',
            'payment_date' => 'required|date',
            'attached_file_name' => 'required|string|max:255',
            'bank_id' => 'required',
            'bank_account_number' => 'required|string|max:255',
            'status' => 'nullable|boolean',
            'created_by' => 'nullable|string',
            'updated_by' => 'nullable|string',
            'ip' => 'nullable|ip',
            'browser' => 'nullable|string',
        ]);
        $plannedPaymentDetails = PlannedPaymentDetails::create($request->all());

        return response()->json(["status"=>201, "success"=>true, "message"=>"PlannedPaymentDetails created successfully.", "data"=>$plannedPaymentDetails],201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'payment_mode_id' => 'required|exists:payment_modes,id',
            'payable_amount' => 'required|numeric',
            'order_id' => 'required|exists:primary_orders,id',
            'payment_date' => 'required|date',
            'attached_file_name' => 'required|string|max:255',
            'bank_id' => 'required',
            'bank_account_number' => 'required|string|max:255',
            'status' => 'nullable|boolean',
            'created_by' => 'nullable|string',
            'updated_by' => 'nullable|string',
            'ip' => 'nullable|ip',
            'browser' => 'nullable|string',
        ]);
        $plannedPaymentDetails = PlannedPaymentDetails::findOrFail($id);

        $plannedPaymentDetails->update($request->all());

        return response()->json(["status"=>200, "success"=>true, "messaage"=>"Planned Payment Details updated successfully.", "data"=>$plannedPaymentDetails],200);
    }

    public function destroy(Request $request, $id)
    {
        $plannedPaymentDetails = PlannedPaymentDetails::findOrFail($id);

        $plannedPaymentDetails->delete();

        return response()->json(["status"=>204, "success"=>true, "message"=>"Planned Payment Details deleted successfully.", "data"=>$plannedPaymentDetails],204);
    }

    public function StatusChange($id)
    {
        $plannedPaymentDetails = PlannedPaymentDetails::findOrFail($id);
        $plannedPaymentDetails->update(['status' => !$plannedPaymentDetails->status]);

        $true = true;

        $false = false;

        return $plannedPaymentDetails->refresh();
    }

}
