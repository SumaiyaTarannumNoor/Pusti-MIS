<?php

namespace App\Http\Controllers;

use App\Models\Committee;
use Illuminate\Http\Request;

class CommitteeController extends Controller
{
    public function index()
    {
        $committees = Committee::with(["committeeMember", "primaryOrder"])->get();


        return response()->json(["statusCode" => 200, "success" => true, "message"=>"All brands showing successfully.","data" => $committees],200);

        $committees = $committees->map(function ($committees) {$committees['status'] = (bool) $committees['status'];
            return $committees;
        });
    }

    public function show($id)
    {
        $committees = Committee::findOrFail($id);
        $committees = Committee::with(["committeeMember", "primaryOrder"])->get();

        return response()->json(["statusCode" => 200, "success" => true, "message" => "Committee is showing successfully.", "data" => $committees],200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'committee_purpose' => 'required|string|max:255',
            'status' => 'nullable|boolean',
            'created_by' => 'nullable|string|max:255',
            'updated_by' => 'nullable|string|max:255',
            'ip' => 'nullable|ip',
            'browser' => 'nullable|string',
        ]);
        $committees = Committee::create($request->all());

        return response()->json(["statusCode" => 201, "success" => true, "message" => "Committee is created successfully.", "data" => $committees],201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'committee_purpose' => 'required|string|max:255',
            'status' => 'nullable|boolean',
            'created_by' => 'nullable|string|max:255',
            'updated_by' => 'nullable|string|max:255',
            'ip' => 'nullable|ip',
            'browser' => 'nullable|string',
        ]);
        $committees = Committee::findOrFail($id);

        $committees -> update($request -> all());

        return response()->json(["statusCode" => 200, "success" => true, "message" => "Committee is updated successfully.", "data" => $committees],200);
    }

    public function destroy(Request $request, $id)
    {
        $committees = Committee ::findOrFail($id);

        $committees -> delete();

        return response()->json(["statusCode" => 204, "success" => true, "message" => "Committee is deleted successfully.", "data" => $committees],204);
    }

    public function StatusChange($id)
    {
        $committees = Committee::findOrFail($id);
        $committees->update(['status' => !$committees->status]);

        $true = true;

        $false = false;

        return $committees->refresh();
    }


}
