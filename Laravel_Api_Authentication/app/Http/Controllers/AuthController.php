<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $request['password'] = bcrypt($request->password);
        $user = User::create($request->toArray());
        $token = $user->createToken('token')->plainTextToken;
        $result = [
            'status' => 'Success',
            'message' => 'Successfully Registered...',
            'data' => $token,
        ];
        return response()->json($result, 200);
    }

    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!Hash::check($request->password, $user->password)) {
            return response(['error' => 'Check Your Password...']);
        }

        $token = $user->createToken('token')->plainTextToken;
        $result = [
            'status' => 'Success',
            'message' => 'Successfully login...',
            'data' => $token,
        ];
        return response()->json($result, 200);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['success' => 'Successfully logout...'], 200);
    }
}
