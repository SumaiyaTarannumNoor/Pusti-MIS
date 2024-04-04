<?php

namespace App\Http\Controllers;

use App\Models\PrimaryOrder;
use Illuminate\Http\Request;

class PrimaryOrderController extends Controller
{
    public function index()
    {
        $primaryOrders = PrimaryOrder::all();
        // $primaryOrders = PrimaryOrder::with(["committee", "primaryOrderProductDetails"])->get();

        return response()->json(["status"=>200, "success"=>true, "message"=> "All Pay Orders showing successfuly.", "data"=>$primaryOrders],200);

        $primaryOrders = $primaryOrders->map(function ($primaryOrders) {$primaryOrders['status'] = (bool) $primaryOrders['status'];
            return $primaryOrders;
        });
    }

    public function show($id)
    {
        $primaryOrders = PrimaryOrder::findOrFail($id);
        $primaryOrders = PrimaryOrder::with(["committee", "primaryOrderProductDetails"])->get();

        return response()->json(["status"=>200, "success"=>true, "message"=>"Primary Order showing successfully.", "data"=>$primaryOrders],200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'has_delivery_approval' => 'required|boolean',
            'is_delivery_approval_approved' => 'required|boolean',
            'distributor_id' => 'required',
            'assigned_committee_id' => 'required|exists:committees,id',
            'current_approver' => 'required|string|max:255',
            'status' => 'nullable|boolean',
            'created_by' => 'nullable|string',
            'updated_by' => 'nullable|string',
            'ip' => 'nullable|ip',
            'browser' => 'nullable|string',
        ]);
        $primaryOrders = PrimaryOrder::create($request->all());

        return response()->json(["status"=>201, "success"=>true, "message"=>"Primary Order created successfully.", "data"=>$primaryOrders],201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'has_delivery_approval' => 'required|boolean',
            'is_delivery_approval_approved' => 'required|boolean',
            'distributor_id' => 'required',
            'assigned_committee_id' => 'required|exists:committees,id',
            'current_approver' => 'required|string|max:255',
            'status' => 'nullable|boolean',
            'created_by' => 'nullable|string',
            'updated_by' => 'nullable|string',
            'ip' => 'nullable|ip',
            'browser' => 'nullable|string',
        ]);
        $primaryOrders = PrimaryOrder::findOrFail($id);

        $primaryOrders->update($request->all());

        return response()->json(["status"=>200, "success"=>true, "message"=> "Primary Order updated successfully.", "data"=>$primaryOrders],200);
    }

    public function destroy(Request $request, $id)
    {
        $primaryOrders = PrimaryOrder::findOrFail($id);

        $primaryOrders->delete();

        return response()->json(["status"=>204, "success"=>true, "message"=>"Primary Order deleted successfully.", "data"=>$primaryOrders],204);
    }

    public function StatusChange($id)
    {
        $primaryOrders = PrimaryOrder::findOrFail($id);
        $primaryOrders->update(['status' => !$primaryOrders->status]);

        $true = true;

        $false = false;

        return $primaryOrders->refresh();
    }
}
