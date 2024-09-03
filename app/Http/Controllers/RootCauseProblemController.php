<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RootCauseProblemController extends Controller
{
    public function index()
    {
        $invap = InvAp::all();
        return response()->json($invap);
    }

    public function store(Request $request)
    {
        $getData = DB::table('root_cause_problems')->where('id', $request->id)->first();
        if (empty($getData)) {
           $rootCauseProblem = DB::table('root_cause_problems')->insert($request->all());
            return response()->json($rootCauseProblem, 201);
        } else {
            $rootCauseProblem = DB::table('root_cause_problems')->where('id', 1)->update($request->all());
            return response()->json($rootCauseProblem, 201);
        }
    }

    public function storeCategory(Request $request)
    {
        $getData = DB::table('root_cause_categories')->where('id', $request->id)->first();
        if (empty($getData)) {
           $rootCauseCategory = DB::table('root_cause_categories')->insert($request->all());
            return response()->json($rootCauseCategory, 201);
        } else {
            $rootCauseCategory = DB::table('root_cause_categories')->where('id', 1)->update($request->all());
            return response()->json($rootCauseCategory, 201);
        }
    }

    // public function show($id)
    // {
    //     $invap = InvAp::find($id);
    //     if (is_null($invap)) {
    //         return response()->json(['message' => 'AP Device not found'], 404);
    //     }
    //     return response()->json($invap);
    // }

    // public function destroy($id)
    // {
    //     $invap = InvAp::find($id);
    //     if (is_null($invap)) {
    //         return response()->json(['message' => 'AP Device not found'], 404);
    //     }
    //     $invap->delete();
    //     return response()->json(null, 204);
    // }
}
