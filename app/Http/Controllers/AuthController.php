<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(){
        // return inertia('index/index');
        return response()->json(['message' => 'masih masuk api login'], 401);
    }
    
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nrp' => 'required|string|max:255|unique:users',
            'position' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            // 'c_password' => 'required|same:password',
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

    public function change_password(Request $request)
    {
        $data = [
            'nrp' => $request->nrp,
            'password' => $request->new_password,
        ];
        // return response()->json($data);

        $user = User::where('nrp', $request->nrp)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message', 'The provided credentials are incorrect.']);
        } else {
            $update_password = User::firstWhere('nrp', $request->nrp)->update($data);
            return response()->json($update_password, 201);
        }

    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(['message' => 'Successfully logged out']);
    }
}
