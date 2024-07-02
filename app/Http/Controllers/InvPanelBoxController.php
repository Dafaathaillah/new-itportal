<?php

namespace App\Http\Controllers;

use App\Models\InvPanelBox;
use Illuminate\Http\Request;

class InvPanelBoxController extends Controller
{
    public function index()
    {
        $invPanelBox = InvPanelBox::all();
        return response()->json($invPanelBox);
    }

    public function store(Request $request)
    {
        $invPanelBox_get_data = InvPanelBox::find($request->id);
        if (empty($invPanelBox_get_data)) {
            $invPanelBox = InvPanelBox::create($request->all());
            return response()->json($invPanelBox, 201);
        } else {
            $invPanelBox = InvPanelBox::firstWhere('id', $request->id)->update($request->all());
            return response()->json($invPanelBox, 201);
        }
    }

    public function show($id)
    {
        $invPanelBox = InvPanelBox::find($id);
        if (is_null($invPanelBox)) {
            return response()->json(['message' => 'Panelbox Data not found'], 404);
        }
        return response()->json($invPanelBox);
    }

    public function destroy($id)
    {
        $invPanelBox = InvPanelBox::find($id);
        if (is_null($invPanelBox)) {
            return response()->json(['message' => 'Panelbox Data not found'], 404);
        }
        $invPanelBox->delete();
        return response()->json(null, 204);
    }
}
