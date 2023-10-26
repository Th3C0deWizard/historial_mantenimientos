<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Requests\api\v1\UserStoreRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\api\v1\UserUpdateRequest;
use App\Http\Resources\qpi\v1\UserResource;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::orderBy('username', 'asc')->get();
        return response()->json(['data' => UserResource::collection($users)], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        $user = User::create($request->all());
        return response()->json(['data' => $user], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return response()->json(['data' => new UserResource($user)], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update($request->all());
        return response()->json(['data' => $user], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->update(['status' => 'inactive']);
        return response(null, 204);
    }
}
