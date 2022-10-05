<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
//use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $user = $request->validate([
            'email'    => ['required', 'string', 'email', 'max:255'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($user)) {
            return response()->json(['message' => 'Authentication is invalid.'], 422);
        }

        $user = Auth::user();
        $accessToken = $user->createToken('access_token')->plainTextToken;

        return response()->json([
            'message' => 'success',
            'data'    => $user,
            'token'   => $accessToken
        ], 201);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json([
            'message' => 'log out success'
        ], 200);
    }
}
