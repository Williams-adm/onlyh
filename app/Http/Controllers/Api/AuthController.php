<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request){
        $user = User::where('user_name', $request['user_name'])->firstOrFail();
        if (!$user || !Hash::check($request['password'], $user->password)) {
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);
        }
        $token = $user->createToken('token')->plainTextToken;   

        return response()->json([
            'message' => 'Success',
            'user' => $user,
            'token' => $token,
            'tokenType' => 'Bearer'
        ]);
    }
}
