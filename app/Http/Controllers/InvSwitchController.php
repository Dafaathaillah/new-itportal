<?php

namespace App\Http\Controllers;

use App\Models\InvSwitch;
use Illuminate\Http\Request;

class InvSwitchController extends Controller
{
    public function index()
    {
        $invSwitch = InvSwitch::all();
        return response()->json($invSwitch);
    }

    public function store(Request $request)
    {
        $invSwitch_get_data = InvSwitch::find($request->id);
        if (empty($invSwitch_get_data)) {
            $invSwitch = InvSwitch::create($request->all());
            return response()->json($invSwitch, 201);
        } else {
            $invSwitch = InvSwitch::firstWhere('id', $request->id)->update($request->all());
            return response()->json($invSwitch, 201);
        }
    }

    public function show($id)
    {
        $invSwitch = InvSwitch::find($id);
        if (is_null($invSwitch)) {
            return response()->json(['message' => 'Switch Device not found'], 404);
        }
        return response()->json($invSwitch);
    }

    public function destroy($id)
    {
        $invSwitch = InvSwitch::find($id);
        if (is_null($invSwitch)) {
            return response()->json(['message' => 'Switch Device not found'], 404);
        }
        $invSwitch->delete();
        return response()->json(null, 204);
    }
}
