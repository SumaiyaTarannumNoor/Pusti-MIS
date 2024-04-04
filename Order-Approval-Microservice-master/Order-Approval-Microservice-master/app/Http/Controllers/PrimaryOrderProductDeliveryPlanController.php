<?php

namespace App\Http\Controllers;

use App\Models\PrimaryOrderProductDeliveryPlan;
use Illuminate\Http\Request;

class PrimaryOrderProductDeliveryPlanController extends Controller
{
    public function index()
    {
        $primaryOrderProductDeliveryPlans = PrimaryOrderProductDeliveryPlan::with(["popDetails"])->get();

        return response()->json(["status"=>200, "success"=>true, "message"=>"All Primary Order Product Details showing successfully.", "data"=>$primaryOrderProductDeliveryPlans],200);

        $primaryOrderProductDeliveryPlans = $primaryOrderProductDeliveryPlans->map(function ($primaryOrderProductDeliveryPlans) {$primaryOrderProductDeliveryPlans['status'] = (bool) $primaryOrderProductDeliveryPlans['status'];
            return $primaryOrderProductDeliveryPlans;
        });
    }

    public function show($id)
    {
        $primaryOrderProductDeliveryPlans = PrimaryOrderProductDeliveryPlan::findOrFail($id);

        return response()->json(["status"=>200, "success"=>true, "message"=>"Primary Order Product Details showing successfully.", "data"=>$primaryOrderProductDeliveryPlans],200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'po_assigned_product_id' => 'required|exists:primary_order_product_details,id',
            'storage_id' => 'required',
            'quantity' => 'required|numeric',
            'status' => 'nullable|boolean', 
            'created_by' => 'nullable|string',
            'updated_by' => 'nullable|string',
            'deleted_by' => 'nullable|string',
            'deleted_at' => 'nullable|date',
            'ip' => 'nullable|ip',
            'browser' => 'nullable|string',
        ]);

        $primaryOrderProductDeliveryPlans = PrimaryOrderProductDeliveryPlan::create($request->all());

        return response()->json(["status"=>201, "success"=>true, "message"=> "Primary Order Product Details created successfully.", "data"=>$primaryOrderProductDeliveryPlans],201);
    
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'po_assigned_product_id' => 'required|exists:primary_order_product_details,id',
            'storage_id' => 'required',
            'quantity' => 'required|numeric',
            'status' => 'nullable|boolean', 
            'created_by' => 'nullable|string',
            'updated_by' => 'nullable|string',
            'deleted_by' => 'nullable|string',
            'deleted_at' => 'nullable|date',
            'ip' => 'nullable|ip',
            'browser' => 'nullable|string',
        ]);

        $primaryOrderProductDeliveryPlans = PrimaryOrderProductDeliveryPlan::findOrFail($id);

        $primaryOrderProductDeliveryPlans->update($request->all());

        return response()->json(["status"=>200, "success"=>true, "message"=>"Primary Order Product Details updated successfully.", "data"=>$primaryOrderProductDeliveryPlans],200);
    }

    public function destroy(Request $request, $id)
    {
        $primaryOrderProductDeliveryPlans = PrimaryOrderProductDeliveryPlan::findOrFail($id);

        $primaryOrderProductDeliveryPlans->delete();

        return response()->json(["status"=>204, "success"=>true, "message"=>"Primary Order Product Details deleted successfully.", "data"=>$primaryOrderProductDeliveryPlans],204);
    }

    public function StatusChange($id)
    {
        $primaryOrderProductDeliveryPlans = PrimaryOrderProductDeliveryPlan::findOrFail($id);
        $primaryOrderProductDeliveryPlans->update(['status' => !$primaryOrderProductDeliveryPlans->status]);

        $true = true;

        $false = false;

        return $primaryOrderProductDeliveryPlans->refresh();
    }
}
