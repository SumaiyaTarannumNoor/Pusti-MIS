<?php

namespace App\Http\Controllers;

use App\Models\PrimaryOrderProductDetails;
use Illuminate\Http\Request;

class PrimaryOrderProductDetailsController extends Controller
{
    public function index()
    {
        $primaryOrderProductDetails = PrimaryOrderProductDetails::with(["primaryOrder", "popDeliveryPlan"])->get();

        return response()->json(["status"=>200, "success"=>true, "message"=>"All Primary Order Product Details showing successfully.", "data"=>$primaryOrderProductDetails],200);

        $primaryOrderProductDetails = $primaryOrderProductDetails->map(function ($primaryOrderProductDetails) {$primaryOrderProductDetails['status'] = (bool) $primaryOrderProductDetails['status'];
            return $primaryOrderProductDetails;
        });
    }

    public function show($id)
    {
        $primaryOrderProductDetails = PrimaryOrderProductDetails::findOrFail($id);

        return response()->json(["status"=>200, "success"=>true, "message"=>"Primary Order Product Details showing successfully.", "data"=>$primaryOrderProductDetails],200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_sku_number' => 'required|string',
            'storage_unit' => 'required|string',
            'quantity' => 'required|numeric',
            'distribution_price' => 'required|numeric',
            'gross_amount' => 'required|numeric',
            'net_amount' => 'required|numeric',
            'primary_order_id' => 'required|exists:primary_orders,id',
            'status' => 'nullable|boolean',
            'created_by' => 'nullable|string',
            'updated_by' => 'nullable|string',
            'deleted_by' => 'nullable|string',
            'deleted_at' => 'nullable|date',
            'ip' => 'nullable|ip',
            'browser' => 'nullable|string',
        ]);

        $primaryOrderProductDetails = PrimaryOrderProductDetails::create($request->all());

        return response()->json(["status"=>201, "success"=>true, "message"=> "Primary Order Product Details created successfully.", "data"=>$primaryOrderProductDetails],201);
    
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'product_sku_number' => 'required|string',
            'storage_unit' => 'required|string',
            'quantity' => 'required|numeric',
            'distribution_price' => 'required|numeric',
            'gross_amount' => 'required|numeric',
            'net_amount' => 'required|numeric',
            'primary_order_id' => 'required|exists:primary_orders,id',
            'status' => 'nullable|boolean', 
            'created_by' => 'nullable|string',
            'updated_by' => 'nullable|string',
            'deleted_by' => 'nullable|string',
            'deleted_at' => 'nullable|date',
            'ip' => 'nullable|ip',
            'browser' => 'nullable|string',
        ]);

        $primaryOrderProductDetails = PrimaryOrderProductDetails::findOrFail($id);

        $primaryOrderProductDetails->update($request->all());

        return response()->json(["status"=>200, "success"=>true, "message"=>"Primary Order Product Details updated successfully.", "data"=>$primaryOrderProductDetails],200);
    }

    public function destroy(Request $request, $id)
    {
        $primaryOrderProductDetails = PrimaryOrderProductDetails::findOrFail($id);

        $primaryOrderProductDetails->delete();

        return response()->json(["status"=>204, "success"=>true, "message"=>"Primary Order Product Details deleted successfully.", "data"=>$primaryOrderProductDetails],204);
    }

    public function StatusChange($id)
    {
        $primaryOrderProductDetails = PrimaryOrderProductDetails::findOrFail($id);
        $primaryOrderProductDetails->update(['status' => !$primaryOrderProductDetails->status]);

        $true = true;

        $false = false;

        return $primaryOrderProductDetails->refresh();
    }
}
