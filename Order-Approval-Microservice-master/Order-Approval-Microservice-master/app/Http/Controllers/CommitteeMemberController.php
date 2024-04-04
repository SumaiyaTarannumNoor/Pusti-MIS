<?php

namespace App\Http\Controllers;

use App\Models\CommitteeMember;
use Illuminate\Http\Request;

class CommitteeMemberController extends Controller
{
    public function index()
    {
        $committeeMembers = CommitteeMember::with(["committee"])->get();

        return response()->json(["statusCode" => 200, "success" => true, "message"=>"Products showing successfully.","data" => $committeeMembers],200);

        $committeeMembers = $committeeMembers->map(function ($committeeMembers) {$committeeMembers['status'] = (bool) $committeeMembers['status'];
            return $committeeMembers;
        });
    }

    public function show($id)
    {
        $committeeMembers = CommitteeMember::findOrFail($id);

        return response()->json(["status" => 200, "success" => true, "message" => "Committee Member showing.", "data"=>$committeeMembers],200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'approval_committee_id' => 'required|exists:committees,id',
            'employee_id' => 'required',
            'sequence_number' => 'required|integer',
            'status' => 'nullable|boolean',
            'created_by' => 'nullable|string|max:255',
            'updated_by' => 'nullable|string|max:255',
            'ip' => 'nullable|ip',
            'browser' => 'nullable|string',
        ]);
        $committeeMembers = CommitteeMember::create($request->all());

        return response()->json(["status" => 201, "success" => true, "message" => "Committee Member created successfully.", "data"=>$committeeMembers], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'approval_committee_id' => 'required|exists:committees,id',
            'employee_id' => 'required',
            'sequence_number' => 'required|integer',
            'status' => 'nullable|boolean',
            'created_by' => 'nullable|string|max:255',
            'updated_by' => 'nullable|string|max:255',
            'ip' => 'nullable|ip',
            'browser' => 'nullable|string',
        ]);
        $committeeMembers = CommitteeMember :: findOrFail($id);

        $committeeMembers->update($request->all());

        return response()->json(["status"=>200, "success"=>true, "message"=>"Committee Member updated successfully.", "data"=>$committeeMembers], 200);
    }

    public function destroy(Request $request, $id)
    {
        $committeeMembers = CommitteeMember::findOrFail($id);

        $committeeMembers->delete();

        return response()->json(["status"=>204, "success"=>true, "message"=>"Committee Member deleted successfully."], 204);
    }

    public function StatusChange($id)
    {
        $committeeMembers = CommitteeMember::findOrFail($id);
        $committeeMembers->update(['status' => !$committeeMembers->status]);

        $true = true;

        $false = false;

        return $committeeMembers->refresh();
    }

}
