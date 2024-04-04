<?php

namespace App\Http\Controllers;

use App\Models\SecondaryOrderDeliveryHistory;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SecondaryOrderDeliveryHistoryController extends Controller
{
    public function index()
    {
        $secondaryDeliveryHistory = SecondaryOrderDeliveryHistory::all();

        return response()->json(["statusCode" => 200, "success" => true, "message"=>"Secondary Order Delivery Histories are showing successfully.","data" => $secondaryDeliveryHistory],200);

        $secondaryDeliveryHistory = $secondaryDeliveryHistory->map(function ($secondaryDeliveryHistory) {$secondaryDeliveryHistory['status'] = (bool) $secondaryDeliveryHistory['status'];
            return $secondaryDeliveryHistory;
        });
    }

    public function show($id)
    {
        $secondaryDeliveryHistory = SecondaryOrderDeliveryHistory::findOrFail($id);

        return response()->json(["statusCode" => 200, "success" => true, "message"=>"Secondary Order Delivery History is showing successfully.","data" => $secondaryDeliveryHistory],200);

    }

    public function store(Request $request)
    {
    
            $request->validate([
                'secondary_order_id' => 'required',
                'pos_id' => 'required',
                'is_otc' => 'required|boolean',
                'product_sku' => 'required|string|max:255',
                'delivered_quantity' => 'required|integer',
                'delivered_by' => 'nullable|string|max:255',
                'delivered_at' => 'nullable|date_format:H:i',
                'created_by' => 'nullable|string|max:255',
                'modified_by' => 'nullable|string|max:255',
                'ip' => 'nullable|ip',
                'browser' => 'nullable|string|max:255',
            ]);

        $secondaryDeliveryHistory = SecondaryOrderDeliveryHistory::create($request->all());

        return response()->json(["statusCode" => 201, "success" => true, "message"=>"Secondary Order Delivery History created successfully.","data" => $secondaryDeliveryHistory],201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'secondary_order_id' => 'required',
            'pos_id' => 'required',
            'is_otc' => 'required|boolean',
            'product_sku' => 'required|string|max:255',
            'delivered_quantity' => 'required|integer',
            'delivered_by' => 'nullable|string|max:255',
            'delivered_at' => 'nullable|date_format:H:i',
            'created_by' => 'nullable|string|max:255',
            'modified_by' => 'nullable|string|max:255',
            'ip' => 'nullable|ip',
            'browser' => 'nullable|string|max:255',
        ]);
        $secondaryDeliveryHistory = SecondaryOrderDeliveryHistory::findOrFail($id);
        $secondaryDeliveryHistory->update($request->all());

        return response()->json(["statusCode" => 200, "success" => true, "message"=>"Secondary Order Delivery History updated successfully.","data" => $secondaryDeliveryHistory],200);

    }

    public function destroy($id)
    {
        $secondaryDeliveryHistory = SecondaryOrderDeliveryHistory::findOrFail($id);
        $secondaryDeliveryHistory->delete();

        return response()->json(["statusCode" => 204, "success" => true, "message"=>"Secondary Order Delivery History deleted successfully."]);

    }

    public function StatusChange($id)
    {
        $secondaryDeliveryHistory = SecondaryOrderDeliveryHistory::find($id);
        $secondaryDeliveryHistory->update(['status' => !$secondaryDeliveryHistory->status]);

        $true = true;

        $false = false;

        return $secondaryDeliveryHistory->refresh();
    }
}
