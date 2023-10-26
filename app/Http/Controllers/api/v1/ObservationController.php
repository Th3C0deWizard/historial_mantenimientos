<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\v1\ObservationStoreRequest;
use App\Http\Requests\api\v1\ObservationUpdateRequest;
use App\Http\Resources\api\v1\ObservationResource;
use App\Models\Observation;

class ObservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $user)
    {
        $observations = Observation::where('created_by', $user)->orderBy('created_at', 'desc')->get();
        return response()->json(['data' => ObservationResource::collection($observations)], 200);
    }

    public function indexComputerObservations(string $computer)
    {

        $observations = Observation::where('computer_id', $computer)->orderBy('created_at', 'desc')->get();
        return response()->json(['data' => ObservationResource::collection($observations)], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ObservationStoreRequest $request, string $user)
    {
        $observation = Observation::create([...$request->all(), 'created_by' => $user]);
        return response()->json(['data' => $observation], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $user, string $observation)
    {
        $observation = Observation::where('created_by', $user)->where('id', $observation)->firstOrFail();
        return response()->json(['data' => new ObservationResource($observation)], 200);
    }

    public function showComputerObservation(string $computer, string $observation)
    {
        $observation = Observation::where('computer_id', $computer)->where('id', $observation)->firstOrFail();
        return response()->json(['data' => new ObservationResource($observation)], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ObservationUpdateRequest $request, Observation $observation)
    {
        $observation->update($request->all());
        return response()->json(['data' => $observation], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Observation $observation)
    {
        $observation->delete();
        return response()->json(['message' => 'Observation deleted succesfully'], 204);
    }
}
