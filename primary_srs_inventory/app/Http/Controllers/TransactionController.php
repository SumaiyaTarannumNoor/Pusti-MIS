<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();

        return response()->json(["statusCode" => 200, "success" => true, "message"=>"All Transactions are showing successfully.","data" => $transactions],200);

        $transactions = $transactions->map(function ($transactions) {$transactions['status'] = (bool) $transactions['status'];
            return $transactions;
        });
    }

    public function show($id)
    {
        $transactions = Transaction::findOrFail($id);

        return response()->json(["statusCode" => 200, "success" => true, "message" => "Transaction is showing successfully.", "data" => $transactions],200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'transaction_mode_id' => 'required|numeric',
            'product_item_id' => 'required|numeric',            
            'quantity' => 'required|numeric',
            'transaction_date' => 'required|date',
            'source_type_id' => 'required|numeric',
            'source_id' => 'required|numeric',
            'destination_type_id' => 'required|numeric',
            'destination_id' => 'required|numeric',
            'status' => 'nullable|boolean',
            'created_by' => 'nullable|string|max:255',
            'modified_by' => 'nullable|string|max:255',
            'ip' => 'nullable|ip',
            'browser' => 'nullable|string',
        ]);
        $transactions = Transaction::create($request->all());

        return response()->json(["statusCode" => 201, "success" => true, "message" => "Transaction is created successfully.", "data" => $transactions],201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'transaction_mode_id' => 'required|numeric',
            'product_item_id' => 'required|numeric',            
            'quantity' => 'required|numeric',
            'transaction_date' => 'required|date',
            'source_type_id' => 'required|numeric',
            'source_id' => 'required|numeric',
            'destination_type_id' => 'required|numeric',
            'destination_id' => 'required|numeric',
            'status' => 'nullable|boolean',
            'created_by' => 'nullable|string|max:255',
            'modified_by' => 'nullable|string|max:255',
            'ip' => 'nullable|ip',
            'browser' => 'nullable|string',
        ]);
        $transactions = Transaction::findOrFail($id);

        $transactions->update($request->all());

        return response()->json(["status"=>200, "success"=>true, "message"=>"Transaction is updated successfully.", "data"=>$transactions],200);
    }

    public function destroy(Request $request, $id)
    {
        $transactions = Transaction::findOrFail($id);

        $transactions->delete();

        return response()->json(["status"=>204, "success"=>true, "message"=>"Transaction is deleted successfully."]);
    }

    public function StatusChange($id)
    {
        $transactions = Transaction::findOrFail($id);
        $transactions->update(['status' => !$transactions->status]);

        $true = true;

        $false = false;

        return $transactions->refresh();
    }
}
