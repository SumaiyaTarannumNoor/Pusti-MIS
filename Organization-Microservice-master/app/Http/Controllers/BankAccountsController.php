<?php

namespace App\Http\Controllers;

use App\Models\BankAccount;
use Illuminate\Http\Request;

class BankAccountsController extends Controller
{
    public function index()
    {
        $bankAccount = BankAccount::all();

        
        // $bankAccount = BankAccount::where('owner_type', $ownerType)
        // ->where('owner_id', $id)
        // ->with(["bank", "owner"])
        // ->get();

        return response()->json(["statusCode" => 200, "success" => true, "message"=>"Bank Accounts showing successfully.","data" => $bankAccount],200);

        $bankAccount = $bankAccount->map(function ($bankAccount) {$bankAccount['status'] = (bool) $bankAccount['status'];
            return $bankAccount;
        });
        
    }

    public function show($id)
    {
        $bankAccount = BankAccount::findOrFail($id);

        return response()->json(["statusCode" => 200, "success" => true, "message"=>"Bank Account showing successfully.","data" => $bankAccount],200);

    }

    public function store(Request $request)
    {
            $request->validate([
                'bank_id' => 'required|exists:banks,id',
                'owner_id' => 'required',
                'owner_type' => 'required|in:distributors,sales_organizations', // Corrected to match enum values
                'bank_account_number' => 'required|string|max:255',
                'status' => 'nullable|boolean',
                'created_by' => 'nullable|string|max:255',
                'updated_by' => 'nullable|string|max:255',
                'ip' => 'nullable|ip',
                'browser' => 'nullable|string|max:255',
            ]);
        $bankAccount = BankAccount::create($request->all());

        return response()->json(["statusCode" => 201, "success" => true, "message"=>"Bank Account created successfully.","data" => $bankAccount],201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'bank_id' => 'required|exists:banks,id',
            'owner_id' => 'required',
            'owner_type' => 'required|in:distributors,sales_organizations', // Corrected to match enum values
            'bank_account_number' => 'required|string|max:255',
            'status' => 'nullable|boolean',
            'created_by' => 'nullable|string|max:255',
            'updated_by' => 'nullable|string|max:255',
            'ip' => 'nullable|ip',
            'browser' => 'nullable|string|max:255',
        ]);
        $bankAccount = BankAccount::findOrFail($id);
        $bankAccount->update($request->all());

        return response()->json(["statusCode" => 200, "success" => true, "message"=>"Bank Account updated successfully.","data" => $bankAccount],200);
    }

    public function destroy($id)
    {
        $bankAccount = BankAccount::findOrFail($id);
        $bankAccount->delete();

        return response()->json(["statusCode" => 204, "success" => true, "message"=>"Bank Account deleted successfully."]);
    }

    public function StatusChange($id)
    {
        $bankAccount = BankAccount::find($id);
        $bankAccount->update(['status' => !$bankAccount->status]);

        $true = true;

        $false = false;

        return $bankAccount->refresh();
    }
}
