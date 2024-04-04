<?php

namespace App\Http\Controllers;

use App\Models\PaymentMode;
use Illuminate\Http\Request;

class PaymentModeController extends Controller
{
    public function index()
    {
        $paymentModes = PaymentMode::with("plannedPaymentDetails")->get();

        return response()->json(["status"=>200, "success"=>true, "message"=> "All Payment Modw showing successfully.", "data"=>$paymentModes],200);

        $paymentModes = $paymentModes->map(function ($paymentModes) {$paymentModes['status'] = (bool) $paymentModes['status'];
            return $paymentModes;
        });
    }

    public function show($id)
    {
        $paymentModes = PaymentMode::findOrFail($id);

        return response()->json(["status"=>200, "success"=>true, "message"=>"Payment Mode showing successfully.", "data"=>$paymentModes],200);

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'nullable|boolean',
            'created_by' => 'nullable|string|max:255',
            'updated_by' => 'nullable|string|max:255',
            'deleted_by' => 'nullable|string|max:255',
            'deleted_at' => 'nullable|date', // Assuming 'deleted_at' should be a date field
            'ip' => 'nullable|ip',
            'browser' => 'nullable|string',
        ]);
        $paymentModes = PaymentMode::create($request->all());

        return response()->json(["status"=>201, "success"=>true, "message"=>"Payment Mode created succesfully.","data"=>$paymentModes],201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'nullable|boolean',
            'created_by' => 'nullable|string|max:255',
            'updated_by' => 'nullable|string|max:255',
            'deleted_by' => 'nullable|string|max:255',
            'deleted_at' => 'nullable|date', // Assuming 'deleted_at' should be a date field
            'ip' => 'nullable|ip',
            'browser' => 'nullable|string',
        ]);
        $paymentModes = PaymentMode::findOrFail($id);

        $paymentModes->update($request->all());

        return response()->json(["status"=>200, "success"=>true, "message"=>"Payment Mode updated successfully.", "data"=>$paymentModes],200);
    }

    public function destroy(Request $request, $id)
    {
        $paymentModes = PaymentMode::findOrFail($id);

        $paymentModes->delete();

        return response()->json(["status"=>204, "success"=>true, "message"=>"Payment Mode deleted successfully.", "data"=>$paymentModes],204);
    }

    public function StatusChange($id)
    {
        $paymentModes = PaymentMode::findOrFail($id);
        $paymentModes->update(['status' => !$paymentModes->status]);

        $true = true;

        $false = false;

        return $paymentModes->refresh();
    }

}
