<?php

namespace App\Http\Controllers;

use App\Models\InvMobileTower;
use Illuminate\Http\Request;

class InvMobileTowerController extends Controller
{
    public function index()
    {
        $invMt = InvMobileTower::all();
        return response()->json($invMt);
    }

    public function store(Request $request)
    {
        $invMt_get_data = InvMobileTower::find($request->id);
        if (empty($invMt_get_data)) {
            $invMt = InvMobileTower::create($request->all());
            return response()->json($invMt, 201);
        } else {
            $invMt = InvMobileTower::firstWhere('id', $request->id)->update($request->all());
            return response()->json($invMt, 201);
        }

    }

    public function show($id)
    {
        $invMt = InvMobileTower::find($id);
        if (is_null($invMt)) {
            return response()->json(['message' => 'Mobile Tower Data not found'], 404);
        }
        return response()->json($invMt);
    }

    public function destroy($id)
    {
        $invMt = InvMobileTower::find($id);
        if (is_null($invMt)) {
            return response()->json(['message' => 'Mobile Tower Data not found'], 404);
        }
        $invMt->delete();
        return response()->json(null, 204);
    }
}
