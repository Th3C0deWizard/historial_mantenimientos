<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Computer;
use Illuminate\Http\Request;

class ComputerController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $computers = Computer::all();
        return response()->json(['data' => $computers]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $user)
    {
        $computer = Computer::create([...$request->all(), 'registered_by' => $user]);
        $computer->registered_by = "api/v1/users/{$user}";
        return response()->json(['data' => $computer], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Computer $computer)
    {
        return response()->json(['data' => $computer]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Computer $computer)
    {
        $computer->update($request->all());
        return response()->json(['data' => $computer]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Computer $computer)
    {
        $computer->delete();
        return response()->json(['message' => 'Computer deleted successfully']);
    }
}
