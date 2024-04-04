<?php

namespace App\Http\Controllers;

use App\Models\ProductBatch;
use Illuminate\Http\Request;

class ProductBatchController extends Controller
{
    public function index()
    {
        $productBatches = ProductBatch::all();

        return response()->json(["statusCode" => 200, "success" => true, "message"=>"All Product Batches are showing successfully.","data" => $productBatches],200);

        $productBatches = $productBatches->map(function ($productBatches) {$productBatches['status'] = (bool) $productBatches['status'];
            return $productBatches;
        });

        $productBatches = $productBatches->map(function ($productBatches) {$productBatches['status'] = (bool) $productBatches['status'];
            return $productBatches;
        });
    }

    public function show($id)
    {
        $productBatches = ProductBatch::findOrFail($id);

        return response()->json(["statusCode" => 200, "success" => true, "message" => "Product Batch is showing successfully.", "data" => $productBatches],200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'batch_number' => 'required|numeric',            
            'status' => 'nullable|boolean',
            'created_by' => 'nullable|string|max:255',
            'updated_by' => 'nullable|string|max:255',
            'ip' => 'nullable|ip',
            'browser' => 'nullable|string',
        ]);
        $productBatches = ProductBatch::create($request->all());

        return response()->json(["statusCode" => 201, "success" => true, "message" => "Product Batch is created successfully.", "data" => $productBatches],201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'batch_number' => 'required|numeric',            
            'status' => 'nullable|boolean',
            'created_by' => 'nullable|string|max:255',
            'updated_by' => 'nullable|string|max:255',
            'ip' => 'nullable|ip',
            'browser' => 'nullable|string',
        ]);
        $productBatches = ProductBatch::findOrFail($id);

        $productBatches->update($request->all());

        return response()->json(["status"=>200, "success"=>true, "message"=>"Product Batch is updated successfully.", "data"=>$productBatches],200);
    }

    public function destroy(Request $request, $id)
    {
        $productBatches = ProductBatch::findOrFail($id);

        $productBatches->delete();

        return response()->json(["status"=>204, "success"=>true, "message"=>"Product Batch is deleted successfully."]);
    }

    public function StatusChange($id)
    {
        $productBatches = ProductBatch::findOrFail($id);
        $productBatches->update(['status' => !$productBatches->status]);

        $true = true;

        $false = false;

        return $productBatches->refresh();
    }
}
