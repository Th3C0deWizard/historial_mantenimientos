<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\api\v1\UserStoreRequest;
use App\Http\Resources\api\v1\UserResource;

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
    public function show()
    {
        $user = auth()->user();
        return response()->json(['data' => new UserResource($user)], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user = auth()->user();
        if ($user instanceof User) {
            $user->update($request->all());
            return response()->json(['data' => $user], 200);
        } else {
            return response()->json(['error' => 'User not found'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        $user = auth()->user();
        if ($user instanceof User) {
            $user->update(['status' => 'inactive']);
            return response(null, 204);
        } else {
            return response()->json(['error' => 'User not found'], 404);
        }
    }

    public function changePassword(Request $request)
    {

        $user = auth()->user();
        if ($user instanceof User) {
            try {
                $userValidate = User::where('id', $user['id'])->where('password', $request['old_password'])->firstOrFail();
            } catch (\Exception $e) {
                error_log($e);
                return response()->json(['error' => 'Old password is incorrect'], 404);
            }
            $userValidate->update(['password' => $request->password]);
            return response()->json(['data' => $user], 200);
        } else {
            return response()->json(['error' => 'User not found'], 404);
        }
    }
}
