<?php

namespace App\Http\Controllers;

use App\Models\LaptopLoan;
use Illuminate\Http\Request;

class LaptopLoanController extends Controller
{
     public function index()
    {
        $laptopLoan = LaptopLoan::all();
        return response()->json($laptopLoan);
    }

    public function store(Request $request)
    {
        $laptopLoan_get_data = LaptopLoan::find($request->id);
        if (empty($laptopLoan_get_data)) {
            $laptopLoan = LaptopLoan::create($request->all());
            return response()->json($laptopLoan, 201);
        } else {
            $laptopLoan = LaptopLoan::firstWhere('id', $request->id)->update($request->all());
            return response()->json($laptopLoan, 201);
        }
    }

    public function show($id)
    {
        $laptopLoan = LaptopLoan::find($id);
        if (is_null($laptopLoan)) {
            return response()->json(['message' => 'Computers Data not found'], 404);
        }
        return response()->json($laptopLoan);
    }

    public function destroy($id)
    {
        $laptopLoan = LaptopLoan::find($id);
        if (is_null($laptopLoan)) {
            return response()->json(['message' => 'Computers Data not found'], 404);
        }
        $laptopLoan->delete();
        return response()->json(null, 204);
    }
}
