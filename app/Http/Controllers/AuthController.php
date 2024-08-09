<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        if ($validated->fails()) {
            return response()->json(['message' => 'Invalid credentials!',
             'data' => [],
             'errors' => $validated->errors()
            ], 200);
        }
        
        $request['type'] = 'admin';
        $credentials = $request->only('email', 'password');
        if (auth()->attempt($credentials)) {
            $token = auth()->user()->createToken('authToken')->plainTextToken;
            return response()->json(['message' => 'You are logged in!', 
            'data' => [
                'token' => $token,
            ]]);
        }
        return response()->json(['message' => 'Invalid credentials!', 'data' => []],
         200);
    }
}
