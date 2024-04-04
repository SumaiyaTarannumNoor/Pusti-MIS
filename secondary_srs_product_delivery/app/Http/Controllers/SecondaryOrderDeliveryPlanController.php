<?php

namespace App\Http\Controllers;

use App\Models\SecondaryOrderDeliveryPlan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SecondaryOrderDeliveryPlanController extends Controller
{
    public function index()
    {
        $secondaryDeliveryPlan = SecondaryOrderDeliveryPlan::all();

        return response()->json(["statusCode" => 200, "success" => true, "message"=>"Secondary Order Delivery Plans are showing successfully.","data" => $secondaryDeliveryPlan],200);

        $secondaryDeliveryPlan = $secondaryDeliveryPlan->map(function ($secondaryDeliveryPlan) {$secondaryDeliveryPlan['status'] = (bool) $secondaryDeliveryPlan['status'];
            return $secondaryDeliveryPlan;
        });
    }

    public function show($id)
    {
        $secondaryDeliveryPlan = SecondaryOrderDeliveryPlan::findOrFail($id);

        return response()->json(["statusCode" => 200, "success" => true, "message"=>"Secondary Order Delivery Plan is showing successfully.","data" => $secondaryDeliveryPlan],200);

    }

    public function store(Request $request)
    {
    
            $request->validate([
                'plan_title' => 'required|string|max:255',
                'secondary_order_id' => 'required',
                'status' => 'nullable|boolean',
                'created_by' => 'nullable|string|max:255',
                'modified_by' => 'nullable|string|max:255',
                'ip' => 'nullable|ip',
                'browser' => 'nullable|string|max:255',
            ]);

        $secondaryDeliveryPlan = SecondaryOrderDeliveryPlan::create($request->all());

        return response()->json(["statusCode" => 201, "success" => true, "message"=>"Secondary Order Delivery Plan created successfully.","data" => $secondaryDeliveryPlan],201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'plan_title' => 'required|string|max:255',
            'secondary_order_id' => 'required',
            'status' => 'nullable|boolean',
            'created_by' => 'nullable|string|max:255',
            'modified_by' => 'nullable|string|max:255',
            'ip' => 'nullable|ip',
            'browser' => 'nullable|string|max:255',
        ]);
        $secondaryDeliveryPlan = SecondaryOrderDeliveryPlan::findOrFail($id);
        $secondaryDeliveryPlan->update($request->all());

        return response()->json(["statusCode" => 200, "success" => true, "message"=>"Secondary Order Delivery Plan updated successfully.","data" => $secondaryDeliveryPlan],200);

    }

    public function destroy($id)
    {
        $secondaryDeliveryPlan = SecondaryOrderDeliveryPlan::findOrFail($id);
        $secondaryDeliveryPlan->delete();

        return response()->json(["statusCode" => 204, "success" => true, "message"=>"Secondary Order Delivery Plan deleted successfully."]);

    }

    public function StatusChange($id)
    {
        $secondaryDeliveryPlan = SecondaryOrderDeliveryPlan::find($id);
        $secondaryDeliveryPlan->update(['status' => !$secondaryDeliveryPlan->status]);

        $true = true;

        $false = false;

        return $secondaryDeliveryPlan->refresh();
    }
}
