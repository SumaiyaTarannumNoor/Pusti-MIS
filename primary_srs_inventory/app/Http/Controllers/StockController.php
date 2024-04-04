<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        $stocs = Stock::all();

        return response()->json(["statusCode" => 200, "success" => true, "message"=>"All Stocks are showing successfully.","data" => $stocs],200);

        $stocs = $stocs->map(function ($stocs) {$stocs['status'] = (bool) $stocs['status'];
            return $stocs;
        });

        $stocs = $stocs->map(function ($stocs) {$stocs['status'] = (bool) $stocs['status'];
            return $stocs;
        });
    }

    public function show($id)
    {
        $stocs = Stock::findOrFail($id);

        return response()->json(["statusCode" => 200, "success" => true, "message" => "Stock is showing successfully.", "data" => $stocs],200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_item_id' => 'required|numeric',
            'batch_number' => 'required|numeric',            
            'storage_id' => 'required|numeric',
            'production_date' => 'nullable|date',
            'stock_id' => 'required|numeric',
            'supplier_type_id' => 'required|numeric',
            'supplier_id' => 'required|numeric',
            'receiving_time' => 'nullable|date_format:H:i',
            'quantity' => 'required|numeric',
            'expiry_date' => 'nullable|date', // Add this line for validation
            'status' => 'nullable|boolean',
            'created_by' => 'nullable|string|max:255',
            'updated_by' => 'nullable|string|max:255',
            'ip' => 'nullable|ip',
            'browser' => 'nullable|string',
        ]);
        $stocs = Stock::create($request->all());

        return response()->json(["statusCode" => 201, "success" => true, "message" => "Stock is created successfully.", "data" => $stocs],201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'product_item_id' => 'required|numeric',
            'batch_number' => 'required|numeric',            
            'storage_id' => 'required|numeric',
            'production_date' => 'nullable|date',
            'stock_id' => 'required|numeric',
            'supplier_type_id' => 'required|numeric',
            'supplier_id' => 'required|numeric',
            'quantity' => 'required|numeric',
            'expiry_date' => 'nullable|date', // Add this line for validation
            'receiving_time' => 'nullable|date_format:H:i',
            'status' => 'nullable|boolean',
            'created_by' => 'nullable|string|max:255',
            'updated_by' => 'nullable|string|max:255',
            'ip' => 'nullable|ip',
            'browser' => 'nullable|string',
        ]);
        $stocs = Stock::findOrFail($id);

        $stocs->update($request->all());

        return response()->json(["status"=>200, "success"=>true, "message"=>"Stock is updated successfully.", "data"=>$stocs],200);
    }

    public function destroy(Request $request, $id)
    {
        $stocs = Stock::findOrFail($id);

        $stocs->delete();

        return response()->json(["status"=>204, "success"=>true, "message"=>"Stock is deleted successfully."]);
    }

    public function StatusChange($id)
    {
        $stocs = Stock::findOrFail($id);
        $stocs->update(['status' => !$stocs->status]);

        $true = true;

        $false = false;

        return $stocs->refresh();
    }    
}
