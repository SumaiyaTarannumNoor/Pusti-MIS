<?php

namespace App\Http\Controllers;

use App\Models\SalesOrganization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesOrganizationController extends Controller
{
    public function index()
    {        
        $salesOrganizations = SalesOrganization::with("bankAccounts")->get();


        return response()->json(["statusCode" => 200, "success" => true, "message"=>"Saless Organizations showing successfully.","data" => $salesOrganizations],200);

        $salesOrganizations = $salesOrganizations->map(function ($salesOrganizations) {$salesOrganizations['status'] = (bool) $salesOrganizations['status'];
            return $salesOrganizations;
        });
    }

    public function show($id)
    {
        $salesOrganizations = SalesOrganization::findOrFail($id);
    

        $bankAccounts= $salesOrganizations->bankAccounts;

        return response()->json(["statusCode" => 200, "success" => true, "message"=>"Saless Organization showing successfully.","data" => $salesOrganizations],200);
    }

    public function store(Request $request)
    {
        
            $request->validate([
                'name' => 'required|string|max:255',
                'status' => 'nullable|boolean',
                'created_by' => 'nullable|string|max:255',
                'updated_by' => 'nullable|string|max:255',
                'ip' => 'nullable|ip',
                'browser' => 'nullable|string|max:255',
            ]);
        $salesOrganizations = SalesOrganization::create($request->all());

        return response()->json(["statusCode" => 201, "success" => true, "message"=>"Saless Organization created successfully.","data" => $salesOrganizations],201);

    }

    public function update(Request $request, $id)
    {

            $request->validate([
                'name' => 'required|string|max:255',
                'status' => 'nullable|boolean',
                'created_by' => 'nullable|string|max:255',
                'updated_by' => 'nullable|string|max:255',
                'ip' => 'nullable|ip',
                'browser' => 'nullable|string|max:255',
            ]);


        $salesOrganizations = SalesOrganization::findOrFail($id);
        $salesOrganizations->update($request->all());

        return response()->json(["statusCode" => 200, "success" => true, "message"=>"Saless Organization updated successfully.","data" => $salesOrganizations],200);

    }

    public function destroy($id)
    {
        $salesOrganizations = SalesOrganization::findOrFail($id);
        $salesOrganizations->delete();

        return response()->json(["statusCode" => 204, "success" => true, "message"=>"Saless Organization deleted successfully."]);
    }

    public function StatusChange($id)
    {
        $salesOrganizations = SalesOrganization::find($id);
        $salesOrganizations->update(['status' => !$salesOrganizations->status]);

        $true = true;

        $false = false;

        return $salesOrganizations->refresh();
    }
}
