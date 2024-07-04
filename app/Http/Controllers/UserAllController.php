<?php

namespace App\Http\Controllers;

use App\Models\UserAll;
use Illuminate\Http\Request;

class UserAllController extends Controller
{
    public function index()
    {
        $userAll = UserAll::all();
        return response()->json($userAll);
    }

    public function store(Request $request)
    {
        $userAll_get_data = UserAll::find($request->id);
        if (empty($userAll_get_data)) {
            $userAll = UserAll::create($request->all());
            return response()->json($userAll, 201);
        } else {
            $userAll = UserAll::firstWhere('id', $request->id)->update($request->all());
            return response()->json($userAll, 201);
        }
    }

    public function show($id)
    {
        $userAll = UserAll::find($id);
        if (is_null($userAll)) {
            return response()->json(['message' => 'User All Site Data not found'], 404);
        }
        return response()->json($userAll);
    }

    public function destroy($id)
    {
        $userAll = UserAll::find($id);
        if (is_null($userAll)) {
            return response()->json(['message' => 'User All SIte Data not found'], 404);
        }
        $userAll->delete();
        return response()->json(null, 204);
    }
}
