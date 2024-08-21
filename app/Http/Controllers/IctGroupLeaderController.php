<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class IctGroupLeaderController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'nrp' => 'required',
            'password' => 'required',
        ]);

        $user = User::where('nrp', $request->nrp)->where('role', 'ict_group_leader')->first();
        $userGet = User::where('nrp', $request->nrp)->first();

        if (empty($user)) {
            if (!$user || !Hash
            ::check($request->password, $user->password)) {
                return response()->json(['message', 'The provided credentials are incorrect.']);
            }else{
                // return redirect()->route('login')
                // ->with('message', 'user not defined your role is: ' . $userGet->role);
                return response()->json(['message', 'user not defined your role is: ' . $userGet->role . ', please change youre login page']);
            }
        }

        return response()->json([
            'user' => $user,
            'token' => $user->createToken('mobile', ['role:ict_group_leader'])->plainTextToken
        ]);
    }
}
