<?php

namespace App\Http\Controllers;

use App\Models\SecondaryDeliverySummary;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SecondaryDeliverySummaryController extends Controller
{
    public function index()
    {
        $secondaryDeliverySummary = SecondaryDeliverySummary::all();

        return response()->json(["statusCode" => 200, "success" => true, "message"=>"Secondary Delivery Summaries are showing successfully.","data" => $secondaryDeliverySummary],200);

        $secondaryDeliverySummary = $secondaryDeliverySummary->map(function ($secondaryDeliverySummary) {$secondaryDeliverySummary['status'] = (bool) $secondaryDeliverySummary['status'];
            return $secondaryDeliverySummary;
        });
    }

    public function show($id)
    {
        $secondaryDeliverySummary = SecondaryDeliverySummary::findOrFail($id);

        return response()->json(["statusCode" => 200, "success" => true, "message"=>"Secondary Delivery Summary is showing successfully.","data" => $secondaryDeliverySummary],200);

    }

    public function store(Request $request)
    {
    
            $request->validate([
                'total_sku' => 'required|integer',
                'total_category' => 'required|integer',
                'total_price' => 'required|integer',
                'route_id' => 'required',
                'total_visited_pos' => 'required|integer',
                'total_memo' => 'required|integer',
                'created_by' => 'nullable|string|max:255',
                'modified_by' => 'nullable|string|max:255',
                'ip' => 'nullable|ip',
                'browser' => 'nullable|string|max:255',
            ]);

        $secondaryDeliverySummary = SecondaryDeliverySummary::create($request->all());

        return response()->json(["statusCode" => 201, "success" => true, "message"=>"Secondary Delivery Summary is created successfully.","data" => $secondaryDeliverySummary],201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'total_sku' => 'required|integer',
            'total_category' => 'required|integer',
            'total_price' => 'required|integer',
            'route_id' => 'required',
            'total_visited_pos' => 'required|integer',
            'total_memo' => 'required|integer',
            'created_by' => 'nullable|string|max:255',
            'modified_by' => 'nullable|string|max:255',
            'ip' => 'nullable|ip',
            'browser' => 'nullable|string|max:255',
        ]);
        $secondaryDeliverySummary = SecondaryDeliverySummary::findOrFail($id);
        $secondaryDeliverySummary->update($request->all());

        return response()->json(["statusCode" => 200, "success" => true, "message"=>"Secondary Delivery Summary is updated successfully.","data" => $secondaryDeliverySummary],200);

    }

    public function destroy($id)
    {
        $secondaryDeliverySummary = SecondaryDeliverySummary::findOrFail($id);
        $secondaryDeliverySummary->delete();

        return response()->json(["statusCode" => 204, "success" => true, "message"=>"Secondary Delivery Summary is deleted successfully."]);

    }

    public function StatusChange($id)
    {
        $secondaryDeliverySummary = SecondaryDeliverySummary::find($id);
        $secondaryDeliverySummary->update(['status' => !$secondaryDeliverySummary->status]);

        $true = true;

        $false = false;

        return $secondaryDeliverySummary->refresh();
    }
}
