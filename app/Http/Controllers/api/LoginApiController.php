<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginApiController extends Controller
{
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->get()->first();

        if($user == null || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'error' => 'Credenciales inválidas'
            ], 400);
        }

        $token = $user->createToken($request->dispositivo)->plainTextToken;
        return response()->json([
            'data' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer'
        ]);
    }

    public function logout(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        $user->currentAccessToken()->delete();
        return $user;
    }

    public function olvidarDispositivos(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        $user->tokens()->delete();
        return $user;
    }
}
