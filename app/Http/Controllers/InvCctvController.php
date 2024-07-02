<?php

namespace App\Http\Controllers;

use App\Models\InvCctv;
use Illuminate\Http\Request;

class InvCctvController extends Controller
{
    public function index()
    {
        $invCctv = InvCctv::all();
        return response()->json($invCctv);
    }

    public function store(Request $request)
    {
        $invCctv_get_data = InvCctv::find($request->id);
        if (empty($invCctv_get_data)) {
            $invCctv = InvCctv::create($request->all());
            return response()->json($invCctv, 201);
        } else {
            $invCctv = InvCctv::firstWhere('id', $request->id)->update($request->all());
            return response()->json($invCctv, 201);
        }

    }

    public function show($id)
    {
        $invCctv = InvCctv::find($id);
        if (is_null($invCctv)) {
            return response()->json(['message' => 'Cctv Device not found'], 404);
        }
        return response()->json($invCctv);
    }

    public function destroy($id)
    {
        $invCctv = InvCctv::find($id);
        if (is_null($invCctv)) {
            return response()->json(['message' => 'Cctv Device not found'], 404);
        }
        $invCctv->delete();
        return response()->json(null, 204);
    }
}
