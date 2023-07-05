<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function register(Request $request)
    {
       Validator::make($request->all(), [
            'name' => 'required|min:4',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ])->validate();

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

    public function login(Request $request){
       $validate = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ])->validate();
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
        return response()->json($result,200);
    }

    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['success'=>'Successfully logout...'],200);
    }
}
