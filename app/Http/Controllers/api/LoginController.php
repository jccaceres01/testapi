<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Login a user
     */
    public function login(Request $request) {
        $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (auth()->attempt($request->only(['email', 'password']))) {
            $user = auth()->user();
            $user->tokens()->delete();
            $token = $user->createToken('api_token');
            $plainToken = $token->plainTextToken;

            return response()->json([
                'user' => $user->only(['name', 'email']),
                'token' => $plainToken
            ], 200);
        } else {
            return response()->json('Bad email or password', 401);
        }
    }

    /**
     * Logout
     */
    public function logout(Request $request) {

        $user = User::where('email', $request->email)->first();
        $user->tokens()->delete();
        
        auth()->logout($user);
        return response()->json(true, 200);
    }
}
