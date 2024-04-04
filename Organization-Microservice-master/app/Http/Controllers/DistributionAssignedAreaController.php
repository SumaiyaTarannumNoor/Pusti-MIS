<?php

namespace App\Http\Controllers;

use App\Models\DistributionAssignedArea;
use Illuminate\Http\Request;

class DistributionAssignedAreaController extends Controller
{
    public function index()
    {
        $assignedAreas = DistributionAssignedArea::with("distributor")->get();

        return response()->json(["statusCode" => 200, "success" => true, "message"=>"Distribution Assigned Areas showing successfully.","data" => $assignedAreas],200);
    }

    public function show($id)
    {
        $assignedAreas = DistributionAssignedArea::findOrFail($id);

        return response()->json(["statusCode" => 200, "success" => true, "message"=>"Distribution Assigned Area showing successfully.","data" => $assignedAreas],200);
    }

    public function store(Request $request)
    {
            $request->validate([
                'distributor_id' => 'required|exists:distributors,id',
                'area_id' => 'required',
                'create_by' => 'nullable|string|max:255',
                'modified_by' => 'nullable|string|max:255',
                'modified_at' => 'nullable|string|max:255',
                'ip' => 'nullable|ip',
                'browser' => 'nullable|string|max:255',
            ]);

        $assignedAreas = DistributionAssignedArea::create($request->all());

        return response()->json(["statusCode" => 201, "success" => true, "message"=>"Distribution Assigned Areas created successfully.","data" => $assignedAreas],201);
    }

    public function update(Request $request, $id)
    {
            $request->validate([
                'distributor_id' => 'required|exists:distributors,id',
                'area_id' => 'required',
                'create_by' => 'nullable|string|max:255',
                'modified_by' => 'nullable|string|max:255',
                'modified_at' => 'nullable|string|max:255',
                'ip' => 'nullable|ip',
                'browser' => 'nullable|string|max:255',
            ]);

        $assignedAreas = DistributionAssignedArea::findOrFail($id);
        $assignedAreas->update($request->all());

        return response()->json(["statusCode" => 200, "success" => true, "message"=>"Distribution Assigned Areas updated successfully.","data" => $assignedAreas],200);
    }

    public function destroy($id)
    {
        $assignedAreas = DistributionAssignedArea::findOrFail($id);
        $assignedAreas->delete();

        return response()->json(["statusCode" => 204, "success" => true, "message"=>"Distribution Assigned Areas deleted successfully."]);
    }
}
