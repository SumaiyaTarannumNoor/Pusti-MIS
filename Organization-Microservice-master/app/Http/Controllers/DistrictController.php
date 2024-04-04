<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function index()
    {
        $districts = District::with(["upazilas", "division"])->get();

        return response()->json(["statusCode" => 200, "success" => true, "message"=>"Districts showing successfully.","data" => $districts],200);

        $districts = $districts->map(function ($districts) {$districts['status'] = (bool) $districts['status'];
            return $districts;
        });
    }

    public function show($id)
    {
        $districts = District::findOrFail($id);

        return response()->json(["statusCode" => 200, "success" => true, "message"=>"District showing successfully.","data" => $districts],200);

    }

    public function store(Request $request)
    {
    
            $request->validate([
                'division_id' => 'required',
                'district_name' => 'required|string|max:255',
                'status' => 'nullable|boolean',
                'created_by' => 'nullable|string|max:255',
                'updated_by' => 'nullable|string|max:255',
                'ip' => 'nullable|ip',
                'browser' => 'nullable|string|max:255',
            ]);

        $districts = District::create($request->all());

        return response()->json(["statusCode" => 201, "success" => true, "message"=>"District created successfully.","data" => $districts],201);
    }

    public function update(Request $request, $id)
    {
            $request->validate([
                'division_id' => 'required',
                'district_name' => 'required|string|max:255',
                'status' => 'nullable|boolean',
                'created_by' => 'nullable|string|max:255',
                'updated_by' => 'nullable|string|max:255',
                'ip' => 'nullable|ip',
                'browser' => 'nullable|string|max:255',
            ]);
        $districts = District::findOrFail($id);
        $districts->update($request->all());

        return response()->json(["statusCode" => 200, "success" => true, "message"=>"District updated successfully.","data" => $districts],200);

    }

    public function destroy($id)
    {
        $districts = District::findOrFail($id);
        $districts->delete();

        return response()->json(["statusCode" => 204, "success" => true, "message"=>"District deleted successfully."]);

    }

    public function StatusChange($id)
    {
        $districts = District::find($id);
        $districts->update(['status' => !$districts->status]);

        $true = true;

        $false = false;

        return $districts->refresh();
    }
}
