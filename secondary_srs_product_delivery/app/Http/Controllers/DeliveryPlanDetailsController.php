<?php

namespace App\Http\Controllers;

use App\Models\DeliveryPlanDetails;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeliveryPlanDetailsController extends Controller
{
    public function index()
    {
        $deliveryPlanDetails = DeliveryPlanDetails::all();

        return response()->json(["statusCode" => 200, "success" => true, "message"=>"Delivery Plan Details are showing successfully.","data" => $deliveryPlanDetails],200);

        $deliveryPlanDetails = $deliveryPlanDetails->map(function ($deliveryPlanDetails) {$deliveryPlanDetails['status'] = (bool) $deliveryPlanDetails['status'];
            return $deliveryPlanDetails;
        });
    }

    public function show($id)
    {
        $deliveryPlanDetails = DeliveryPlanDetails::findOrFail($id);

        return response()->json(["statusCode" => 200, "success" => true, "message"=>"Delivery Plan Details is showing successfully.","data" => $deliveryPlanDetails],200);

    }

    public function store(Request $request)
    {
    
            $request->validate([
                'delivery_plan_id' => 'required|exists:secondary_order_delivery_plans,id',
                'product_sku' => 'required|string',
                'planned_quantity' => 'required|integer',
                'delivered_by' => 'nullable|string|max:255',
                'planned_delivery_date' => 'nullable|date',
                'status' => 'nullable|boolean',
                'created_by' => 'nullable|string|max:255',
                'modified_by' => 'nullable|string|max:255',
                'ip' => 'nullable|ip',
                'browser' => 'nullable|string|max:255',
            ]);

        $deliveryPlanDetails = DeliveryPlanDetails::create($request->all());

        return response()->json(["statusCode" => 201, "success" => true, "message"=>"Delivery Plan Details is created successfully.","data" => $deliveryPlanDetails],201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'delivery_plan_id' => 'required|exists:secondary_order_delivery_plans,id',
            'product_sku' => 'required|string',
            'planned_quantity' => 'required|integer',
            'delivered_by' => 'nullable|string|max:255',
            'planned_delivery_date' => 'nullable|date',
            'status' => 'nullable|boolean',
            'created_by' => 'nullable|string|max:255',
            'modified_by' => 'nullable|string|max:255',
            'ip' => 'nullable|ip',
            'browser' => 'nullable|string|max:255',
        ]);

        $deliveryPlanDetails = DeliveryPlanDetails::findOrFail($id);
        $deliveryPlanDetails->update($request->all());

        return response()->json(["statusCode" => 200, "success" => true, "message"=>"Delivery Plan Details is updated successfully.","data" => $deliveryPlanDetails],200);

    }

    public function destroy($id)
    {
        $deliveryPlanDetails = DeliveryPlanDetails::findOrFail($id);
        $deliveryPlanDetails->delete();

        return response()->json(["statusCode" => 204, "success" => true, "message"=>"Delivery Plan Details is deleted successfully."]);

    }

    public function StatusChange($id)
    {
        $deliveryPlanDetails = DeliveryPlanDetails::find($id);
        $deliveryPlanDetails->update(['status' => !$deliveryPlanDetails->status]);

        $true = true;

        $false = false;

        return $deliveryPlanDetails->refresh();
    }
}
