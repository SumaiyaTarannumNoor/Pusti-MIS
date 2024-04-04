<?php

namespace App\Http\Controllers;

use App\Models\SupplierType;
use Illuminate\Http\Request;

class SupplierTypeController extends Controller
{
    public function index()
    {
        $supplierTypes = SupplierType::all();

        return response()->json(["statusCode" => 200, "success" => true, "message"=>"All Supplier Types are showing successfully.","data" => $supplierTypes],200);

        $supplierTypes = $supplierTypes->map(function ($supplierTypes) {$supplierTypes['status'] = (bool) $supplierTypes['status'];
            return $supplierTypes;
        });
    }

    public function show($id)
    {
        $supplierTypes = SupplierType::findOrFail($id);

        return response()->json(["statusCode" => 200, "success" => true, "message" => "Supplier Type is showing successfully.", "data" => $supplierTypes],200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'supplier_type_name' => 'required|string|max:255',
            'status' => 'nullable|boolean',
            'created_by' => 'nullable|string|max:255',
            'modified_by' => 'nullable|string|max:255',
            'ip' => 'nullable|ip',
            'browser' => 'nullable|string',
        ]);
        $supplierTypes = SupplierType::create($request->all());

        return response()->json(["statusCode" => 201, "success" => true, "message" => "Supplier Type is created successfully.", "data" => $supplierTypes],201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([

            'supplier_type_name' => 'required|string|max:255',
            'status' => 'nullable|boolean',
            'created_by' => 'nullable|string|max:255',
            'modified_by' => 'nullable|string|max:255',
            'ip' => 'nullable|ip',
            'browser' => 'nullable|string',
        ]);
        $supplierTypes = SupplierType::findOrFail($id);

        $supplierTypes->update($request->all());

        return response()->json(["status"=>200, "success"=>true, "message"=>"Supplier Type is updated successfully.", "data"=>$supplierTypes],200);
    }

    public function destroy(Request $request, $id)
    {
        $supplierTypes = SupplierType::findOrFail($id);

        $supplierTypes->delete();

        return response()->json(["status"=>204, "success"=>true, "message"=>"Supplier Type is deleted successfully."]);
    }

    public function StatusChange($id)
    {
        $supplierTypes = SupplierType::findOrFail($id);
        $supplierTypes->update(['status' => !$supplierTypes->status]);

        $true = true;

        $false = false;

        return $supplierTypes->refresh();
    }
}
