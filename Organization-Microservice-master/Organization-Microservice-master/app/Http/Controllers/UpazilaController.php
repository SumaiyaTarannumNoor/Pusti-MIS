<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upazila;

class UpazilaController extends Controller
{
    //
    public function index()
    {
        $upazilas = Upazila::with(["district", "distributor"])->get();

        return response()->json(["statusCode" => 200, "success" => true, "message"=>"Upazilas showing successfully.","data" => $upazilas],200);

        $upazilas = $upazilas->map(function ($upazilas) {$upazilas['status'] = (bool) $upazilas['status'];
            return $upazilas;
        });
    }

    public function show($id)
    {
        $upazilas = Upazila::findOrFail($id);

        return response()->json(["statusCode" => 200, "success" => true, "message"=>"Upazila showing successfully.","data" => $upazilas],200);
    }

    public function store(Request $request)
    {
            $request->validate([
                'district_id' => 'required|exists:districts,id',
                'upazila_name' => 'required|string|max:255',
                'status' => 'nullable|boolean',
                'created_by' => 'nullable|string|max:255',
                'updated_by' => 'nullable|string|max:255',
                'ip' => 'nullable|ip',
                'browser' => 'nullable|string|max:255',
            ]);


        $upazilas = Upazila::create($request->all());

        return response()->json(["statusCode" => 201, "success" => true, "message"=>"Upazila created successfully.","data" => $upazilas],201);

    }

    public function update(Request $request, $id)
    {

            $request->validate([
                'district_id' => 'required|exists:districts,id',
                'upazila_name' => 'required|string|max:255',
                'status' => 'nullable|boolean',
                'created_by' => 'nullable|string|max:255',
                'updated_by' => 'nullable|string|max:255',
                'ip' => 'nullable|ip',
                'browser' => 'nullable|string|max:255',
            ]);

        $upazilas = Upazila::findOrFail($id);
        $upazilas->update($request->all());

        return response()->json(["statusCode" => 200, "success" => true, "message"=>"Upazila updated successfully.","data" => $upazilas],200);

    }

    public function destroy($id)
    {
        $upazilas = Upazila::findOrFail($id);
        $upazilas->delete();

        return response()->json(["statusCode" => 204, "success" => true, "message"=>"Upazila deleted successfully."]);
    }

    public function StatusChange($id)
    {
        $upazilas = Upazila::find($id);
        $upazilas->update(['status' => !$upazilas->status]);

        $true = true;

        $false = false;

        return $upazilas->refresh();
    }
}
