<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function login(Request $request){
        $request->validate([
            'email'=> 'required|email|exists:users',
            'password'=> 'required',
        ]);
        $user = User::where('email', $request->email)->first();

        if(!$user || !Hash::check($request->password, $user->password)){
            return [
                "message" => "the provided credentials are incorrect."
            ];
        };
        $token = $user->createToken($user->name);

        return[
            'user' => $user,
            'token' => $token->plainTextToken
        ];
    }
    public function logout(Request $request){
        $request->user()->tokens()->delete();
        return [
            "message" => "you are logged out."
        ];
    }
}
