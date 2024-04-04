<?php

namespace App\Http\Controllers;

use App\Models\AdministrativeDivision;
use Illuminate\Http\Request;

class AdministrativeDivisionController extends Controller
{
    public function index()
    {
        $administrativeDivisions = AdministrativeDivision::all();

        return response()->json(["statusCode" => 200, "success" => true, "message"=>"Administrative Division are showing successfully.","data" => $administrativeDivisions],200);

        $administrativeDivisions = $administrativeDivisions->map(function ($administrativeDivisions) {$administrativeDivisions['status'] = (bool) $administrativeDivisions['status'];
            return $administrativeDivisions;
        });
    }

    public function show($id)
    {
        $administrativeDivisions = AdministrativeDivision::findOrFail($id);

        return response()->json(["statusCode" => 200, "success" => true, "message"=>"Administrative Division is showing successfully.","data" => $administrativeDivisions],200);

    }

    public function store(Request $request)
    {
    
            $request->validate([
                'division_name' => 'required|string|max:255',
                'status' => 'nullable|boolean',
                'created_by' => 'nullable|string|max:255',
                'updated_by' => 'nullable|string|max:255',
                'ip' => 'nullable|ip',
                'browser' => 'nullable|string|max:255',
            ]);

        $administrativeDivisions = AdministrativeDivision::create($request->all());

        return response()->json(["statusCode" => 201, "success" => true, "message"=>"Administrative Division created successfully.","data" => $administrativeDivisions],201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'division_name' => 'required|string|max:255',
            'status' => 'nullable|boolean',
            'created_by' => 'nullable|string|max:255',
            'updated_by' => 'nullable|string|max:255',
            'ip' => 'nullable|ip',
            'browser' => 'nullable|string|max:255',
        ]);
        $administrativeDivisions = AdministrativeDivision::findOrFail($id);
        $administrativeDivisions->update($request->all());

        return response()->json(["statusCode" => 200, "success" => true, "message"=>"Administrative Division updated successfully.","data" => $administrativeDivisions],200);

    }

    public function destroy($id)
    {
        $administrativeDivisions = AdministrativeDivision::findOrFail($id);
        $administrativeDivisions->delete();

        return response()->json(["statusCode" => 204, "success" => true, "message"=>"Administrative Division deleted successfully."]);

    }

    public function StatusChange($id)
    {
        $administrativeDivisions = AdministrativeDivision::find($id);
        $administrativeDivisions->update(['status' => !$administrativeDivisions->status]);

        $true = true;

        $false = false;

        return $administrativeDivisions->refresh();
    }
}
