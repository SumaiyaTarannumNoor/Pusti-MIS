<?php

namespace App\Http\Controllers;

use App\Models\Storage;
use Illuminate\Http\Request;

class StorageController extends Controller
{
    public function index()
    {
        $storages = Storage::all();

        return response()->json(["statusCode" => 200, "success" => true, "message"=>"Storages showing successfully.","data" => $storages],200);

        $storages = $storages->map(function ($storages) {$storages['status'] = (bool) $storages['status'];
            return $salesOrganizations;
        });

    }

    public function show($id)
    {
        $storages = Storage::findOrFail($id);

        return response()->json(["statusCode" => 200, "success" => true, "message"=>"Storage showing successfully.","data" => $storages],200);
    }

    public function store(Request $request)
    {
    
            $request->validate([
                'owner_id' => 'required',
                'type_id' => 'required',
                'name' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'person_in_charge' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'telephone' => 'required|string|max:20',
                'mobile' => 'required|string|max:20',
                'status' => 'nullable|boolean',
                'create_by' => 'nullable|string|max:255',
                'modified_by' => 'nullable|string|max:255',
                'modified_at' => 'nullable|date',
                'ip' => 'nullable|ip',
                'browser' => 'nullable|string|max:255',
            ]);

        $storages = Storage::create($request->all());

        return response()->json(["statusCode" => 201, "success" => true, "message"=>"Storage created successfully.","data" => $storages],201);
    }

    public function update(Request $request, $id)
    {
        
            $request->validate([
                'owner_id' => 'required',
                'type_id' => 'required',
                'name' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'person_in_charge' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'telephone' => 'required|string|max:20',
                'mobile' => 'required|string|max:20',
                'status' => 'nullable|boolean',
                'create_by' => 'nullable|string|max:255',
                'modified_by' => 'nullable|string|max:255',
                'modified_at' => 'nullable|date',
                'ip' => 'nullable|ip',
                'browser' => 'nullable|string|max:255',
            ]);

        $storages = Storage::findOrFail($id);
        $storages->update($request->all());

        return response()->json(["statusCode" => 200, "success" => true, "message"=>"Storage updated successfully.","data" => $storages],200);
    }

    public function destroy($id)
    {
        $storages = Storage::findOrFail($id);
        $storages->delete();

        return response()->json(["statusCode" => 204, "success" => true, "message"=>"Storage deleted successfully."]);
    }

    public function StatusChange($id)
    {
        $storages = Storage::find($id);
        $storages->update(['status' => !$storages->status]);

        $true = true;

        $false = false;

        return $storages->refresh();
    }
}
