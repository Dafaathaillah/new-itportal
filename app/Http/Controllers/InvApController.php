<?php

namespace App\Http\Controllers;

use App\Models\InvAp;
use Illuminate\Http\Request;

class InvApController extends Controller
{
    public function index()
    {
        $invap = InvAp::all();
        return response()->json($invap);
    }

    public function store(Request $request)
    {
        $invap_get_data = InvAp::find($request->id);
        if (empty($invap_get_data)) {
            $invap = InvAp::create($request->all());
            return response()->json($invap, 201);
        } else {
            $invap = InvAp::firstWhere('id', $request->id)->update($request->all());
            return response()->json($invap, 201);
        }

    }

    public function show($id)
    {
        $invap = InvAp::find($id);
        if (is_null($invap)) {
            return response()->json(['message' => 'AP Device not found'], 404);
        }
        return response()->json($invap);
    }

    public function destroy($id)
    {
        $invap = InvAp::find($id);
        if (is_null($invap)) {
            return response()->json(['message' => 'AP Device not found'], 404);
        }
        $invap->delete();
        return response()->json(null, 204);
    }
}
