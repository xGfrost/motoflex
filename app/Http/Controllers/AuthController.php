<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    
    public function register(Request $request){
        $fields = $request->validate([
            'name'=> 'required|max:255',
            'email'=> 'required|email|unique:users',
            'password'=> 'required|confirmed|min:8',
            'phone_number'=> 'required|max:12',
            'address'=> 'required|max:255',
        ]);
        $user = User::create($fields);

        $token = $user->createToken($request->name);

        return[
            'user' => $user,
            'token' => $token->plainTextToken
        ];
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return response()->json([
                'message' => 'The provided credentials are incorrect.'
            ], 401);
        }

        $accessToken = $user->createToken('access_token')->plainTextToken;

        $refreshToken = base64_encode(Str::random(40));

        return response()->json([
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ],
            'accessToken' => $accessToken,
            'refreshToken' => $refreshToken
        ], 200);
    }

    public function logout(Request $request){
        $request->user()->tokens()->delete();
        return [
            "message" => "you are logged out."
        ];
    }
}
