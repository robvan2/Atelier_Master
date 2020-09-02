<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthApiController extends Controller
{
    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => 'The email or password is incorrect, please try again'
            ], 403);
        }
        $token = $user->createToken('access-token')->accessToken;

        return response(['user' => $user, 'token' => $token], 200);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);
        $user = User::create(request(['name', 'email', 'password']));
        $token = $user->createToken('access-token')->accessToken;
        return response(['user' => $user, 'token' => $token], 200);
    }
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response(['message' => 'user logged-out'], 200);
    }
    public function checkToken(Request $request)
    {
        return response(['message' => 'valid token'], 200);
    }
}
