<?php

namespace App\Http\Controllers;


use App\Models\Distributor;
use Illuminate\Http\Request;

class DistributorController extends Controller
{
    public function index()
    {
       //$distributors = Distributor::all();
       $distributors = Distributor::with(["bankAccounts", "storage", "upazila", "daa"])->get();
      

        return response()->json(["statusCode" => 200, "success" => true, "message"=>"Distributors showing successfully.","data" => $distributors],200);

        $distributors = $distributors->map(function ($distributors) {$distributors['status'] = (bool) $distributors['status'];
            return $distributors;
        });
    }

    public function show($id)
    {
        $distributors = Distributor::findOrFail($id);
        $distributors = Distributor::with(["bankAccounts", "storage", "upazila", "daa"])->get();
      
        //$bankAccounts= $distributors->bankAccounts;

        // $distributor->bankAccounts= $bankAccounts;

        return response()->json(["statusCode" => 200, "success" => true, "message"=>"Distributor showing successfully.","data" => $distributors],200);
    }

    public function store(Request $request)
    {
            $request->validate([
                'name' => 'required|string|max:255',
                // 'storage_id' => 'required|exists:storages,id',
                // 'upazila_id' => 'required|exists:upazilas,id',
                'distributor_type' => 'required',
                'division_id' => 'required',
                'region_id' => 'required',
                'area_id' => 'required',
                'erp_id' => 'required',
                'proprietor_name' => 'nullable|string|max:255',
                'proprietor_dob' => 'nullable|date',
                'address' => 'nullable|string|max:255',
                'mobile_number' => 'nullable|string|max:20',
                'has_printer' => 'nullable|boolean',
                'has_pc' => 'nullable|boolean',
                'has_live_app' => 'nullable|boolean',
                'has_direct_sale' => 'nullable|boolean',
                'has_storage' => 'nullable|boolean',
                'opening_date' => 'nullable|date',
                'emergency_contact_name' => 'nullable|string|max:255',
                'emergency_contact_number' => 'nullable|string|max:20',
                'emergency_contact_relation' => 'nullable|string|max:255',
                'union' => 'nullable|string|max:255',
                'ward' => 'nullable|string|max:255',
                'village' => 'nullable|string|max:255',
                'status' => 'nullable|boolean',
                'created_by' => 'nullable|string|max:255',
                'updated_by' => 'nullable|string|max:255',
                'ip' => 'nullable|ip',
                'browser' => 'nullable|string|max:255',
            ]);

        $distributors = Distributor::create($request->all());

        return response()->json(["statusCode" => 201, "success" => true, "message"=>"Distributors created successfully.","data" => $distributors],201);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            // 'storage_id' => 'required|exists:storages,id',
            // 'upazila_id' => 'required|exists:upazilas,id',
            'distributor_type' => 'required',
            'division_id' => 'required',
            'region_id' => 'required',
            'area_id' => 'required',
            'erp_id' => 'required',
            'proprietor_name' => 'nullable|string|max:255',
            'proprietor_dob' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'mobile_number' => 'nullable|string|max:20',
            'has_printer' => 'nullable|boolean',
            'has_pc' => 'nullable|boolean',
            'has_live_app' => 'nullable|boolean',
            'has_direct_sale' => 'nullable|boolean',
            'has_storage' => 'nullable|boolean',
            'opening_date' => 'nullable|date',
            'emergency_contact_name' => 'nullable|string|max:255',
            'emergency_contact_number' => 'nullable|string|max:20',
            'emergency_contact_relation' => 'nullable|string|max:255',
            'union' => 'nullable|string|max:255',
            'ward' => 'nullable|string|max:255',
            'village' => 'nullable|string|max:255',
            'status' => 'nullable|boolean',
            'created_by' => 'nullable|string|max:255',
            'updated_by' => 'nullable|string|max:255',
            'ip' => 'nullable|ip',
            'browser' => 'nullable|string|max:255',
        ]);


        $distributors = Distributor::findOrFail($id);
        $distributors->update($request->all());

        return response()->json(["statusCode" => 200, "success" => true, "message"=>"Distributor updated successfully.","data" => $distributors],200);
    }

    public function destroy($id)
    {
        $distributors = Distributor::findOrFail($id);
        $distributors->delete();

        return response()->json(["statusCode" => 204, "success" => true, "message"=>"Distributor deleted successfully."]);
    }

    public function getDistributorsByIds(Request $request)
    {
        $selectedIds = $request->input('ids'); // Assuming you're passing selected_ids as an array in the request

        // Validate input if necessary

        $distributors = Distributor::whereIn('id', $selectedIds)->get();

        return response()->json(["statusCode" => 200, "success" => true, "message"=>"Distributors showing successfully.","data" => $distributors],200);
    }

    public function StatusChange($id)
    {
        $distributors = Distributor::find($id);
        $distributors->update(['status' => !$distributors->status]);

        $true = true;

        $false = false;

        return $distributors->refresh();
    }
}
