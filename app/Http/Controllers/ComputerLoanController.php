<?php

namespace App\Http\Controllers;

use App\Models\ComputerLoan;
use Illuminate\Http\Request;

class ComputerLoanController extends Controller
{
    public function index()
    {
        $computerLoan = ComputerLoan::all();
        return response()->json($computerLoan);
    }

    public function store(Request $request)
    {
        $computerLoan_get_data = ComputerLoan::find($request->id);
        if (empty($computerLoan_get_data)) {
            $computerLoan = ComputerLoan::create($request->all());
            return response()->json($computerLoan, 201);
        } else {
            $computerLoan = ComputerLoan::firstWhere('id', $request->id)->update($request->all());
            return response()->json($computerLoan, 201);
        }
    }

    public function show($id)
    {
        $computerLoan = ComputerLoan::find($id);
        if (is_null($computerLoan)) {
            return response()->json(['message' => 'Computers Data not found'], 404);
        }
        return response()->json($computerLoan);
    }

    public function destroy($id)
    {
        $computerLoan = ComputerLoan::find($id);
        if (is_null($computerLoan)) {
            return response()->json(['message' => 'Computers Data not found'], 404);
        }
        $computerLoan->delete();
        return response()->json(null, 204);
    }
}
