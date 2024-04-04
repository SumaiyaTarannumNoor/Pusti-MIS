<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function index()
    {
        $banks = Bank::all();

        return response()->json(["statusCode" => 200, "success" => true, "message"=>"Products showing successfully.","data" => $banks],200);

        $banks = $banks->map(function ($banks) {$banks['status'] = (bool) $banks['status'];
            return $banks;
        });
    }

    public function show($id)
    {
        $banks = Bank::findOrFail($id);

        return response()->json(["statusCode" => 200, "success" => true, "message"=>"Bank showing successfully.","data" => $banks],200);

    }

    public function store(Request $request)
    {
    
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'contact_person' => 'required|string|max:255',
                'contact_person_mobile' => 'required|string|max:20',
                'status' => 'nullable|boolean',
                'created_by' => 'nullable|string|max:255',
                'modified_by' => 'nullable|string|max:255',
                'ip' => 'nullable|ip',
                'browser' => 'nullable|string|max:255',
            ]);

        $banks = Bank::create($request->all());

        return response()->json(["statusCode" => 201, "success" => true, "message"=>"Bank created successfully.","data" => $banks],201);
    }

    public function update(Request $request, $id)
    {
            $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'required|string|max:255',
                'contact_person' => 'required|string|max:255',
                'contact_person_mobile' => 'required|string|max:20',
                'status' => 'nullable|boolean',
                'created_by' => 'nullable|string|max:255',
                'modified_by' => 'nullable|string|max:255',
                'ip' => 'nullable|ip',
                'browser' => 'nullable|string|max:255',
            ]);
        $banks = Bank::findOrFail($id);
        $banks->update($request->all());

        return response()->json(["statusCode" => 200, "success" => true, "message"=>"Bank updated successfully.","data" => $banks],200);

    }

    public function destroy($id)
    {
        $banks = Bank::findOrFail($id);
        $banks->delete();

        return response()->json(["statusCode" => 204, "success" => true, "message"=>"Bank deleted successfully."]);

    }

    public function StatusChange($id)
    {
        $banks = Bank::find($id);
        $banks->update(['status' => !$banks->status]);

        $true = true;

        $false = false;

        return $banks->refresh();
    }
}
