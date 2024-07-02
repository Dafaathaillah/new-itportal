<?php

namespace App\Http\Controllers;

use App\Models\InvPrinter;
use Illuminate\Http\Request;

class InvPrinterController extends Controller
{
    public function index()
    {
        $invPrinter = InvPrinter::all();
        return response()->json($invPrinter);
    }

    public function store(Request $request)
    {
        $invPrinter_get_data = InvPrinter::find($request->id);
        if (empty($invPrinter_get_data)) {
            $invPrinter = InvPrinter::create($request->all());
            return response()->json($invPrinter, 201);
        } else {
            $invPrinter = InvPrinter::firstWhere('id', $request->id)->update($request->all());
            return response()->json($invPrinter, 201);
        }

    }

    public function show($id)
    {
        $invPrinter = InvPrinter::find($id);
        if (is_null($invPrinter)) {
            return response()->json(['message' => 'Computers Data not found'], 404);
        }
        return response()->json($invPrinter);
    }

    public function destroy($id)
    {
        $invPrinter = InvPrinter::find($id);
        if (is_null($invPrinter)) {
            return response()->json(['message' => 'Computers Data not found'], 404);
        }
        $invPrinter->delete();
        return response()->json(null, 204);
    }
}
