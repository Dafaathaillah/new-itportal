<?php

namespace App\Http\Controllers;

use App\Models\InvGps;
use Illuminate\Http\Request;

class InvGpsController extends Controller
{
    public function index()
    {
        $invGps = InvGps::all();
        return response()->json($invGps);
    }

    public function store(Request $request)
    {
        $invGps_get_data = InvGps::find($request->id);
        if (empty($invGps_get_data)) {
            $invGps = InvGps::create($request->all());
            return response()->json($invGps, 201);
        } else {
            $invGps = InvGps::firstWhere('id', $request->id)->update($request->all());
            return response()->json($invGps, 201);
        }

    }

    public function show($id)
    {
        $invGps = InvGps::find($id);
        if (is_null($invGps)) {
            return response()->json(['message' => 'Gps Data not found'], 404);
        }
        return response()->json($invGps);
    }

    public function destroy($id)
    {
        $invGps = InvGps::find($id);
        if (is_null($invGps)) {
            return response()->json(['message' => 'Gps Data not found'], 404);
        }
        $invGps->delete();
        return response()->json(null, 204);
    }
}
