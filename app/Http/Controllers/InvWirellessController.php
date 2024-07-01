<?php

namespace Wirellessp\Http\Controllers;

use Wirellessp\Models\InvWirelless;
use Illuminate\Http\Request;

class InvWirellessController extends Controller
{
    public function index()
    {
        $invWrilless = InvWirelless::all();
        return response()->json($invWrilless);
    }

    public function store(Request $request)
    {
        $invWrilless_get_data = InvWirelless::find($request->id);
        if (empty($invWrilless_get_data)) {
            $invWrilless = InvWirelless::create($request->all());
            return response()->json($invWrilless, 201);
        } else {
            $invWrilless = InvWirelless::firstWhere('id', $request->id)->update($request->all());
            return response()->json($invWrilless, 201);
        }

    }

    public function show($id)
    {
        $invWrilless = InvWirelless::find($id);
        if (is_null($invWrilless)) {
            return response()->json(['message' => 'Wirelless Device not found'], 404);
        }
        return response()->json($invWrilless);
    }

    public function destroy($id)
    {
        $invWrilless = InvWirelless::find($id);
        if (is_null($invWrilless)) {
            return response()->json(['message' => 'Wirelless Device not found'], 404);
        }
        $invWrilless->delete();
        return response()->json(null, 204);
    }
}
