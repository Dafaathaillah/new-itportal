<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nrp' => 'required|string|max:255|unique:users',
            'position' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'c_password' => 'required|same:password',
        ]);

        $user = User::create([
            'name' => $request->name,
            'nrp' => $request->nrp,
            'role' => $request->role,
            'position' => $request->position,
            'password' => Hash::make($request->password),
        ]);

        return response()->json(['message' => 'User registered successfully'], 201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'nrp' => 'required|string',
            'password' => 'required|string',
        ]);

        if (!Auth::attempt($request->only('nrp', 'password'))) {
            return response()->json(['message' => 'Invalid login credentials'], 401);
        }

        $user = Auth::user();
        $token = $user->createToken('MyApp')->plainTextToken;

        return response()->json(['token' => $token, 'user' => $user]);
        // return response()->json(['user' => $user]);
    }

    // public function login(Request $request)
    // {
    //     $login = Auth::Attempt($request->all());
    //     if ($login) {
    //         $user = Auth::user();
    //         $user->api_token = Str()->random(100);
    //         $user->save();
    //         // $user->makeVisible('api_token');

    //         return response()->json([
    //             'response_code' => 200,
    //             'message' => 'Login Berhasil',
    //             'conntent' => $user
    //         ]);
    //     } else {
    //         return response()->json([
    //             'response_code' => 404,
    //             'message' => 'Username atau Password Tidak Ditemukan!'
    //         ]);
    //     }
    // }

    public function me(Request $request)
    {
        return response()->json($request->user());
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Successfully logged out']);
    }
}
