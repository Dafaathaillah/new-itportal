<?php

namespace App\Http\Controllers;

use App\Models\InvComputer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InvComputerController extends Controller
{
    public function index()
    {
        $invComputers = InvComputer::all();
        return response()->json($invComputers);
    }

    public function store(Request $request)
    {
        // start generate code
        $currentDate = Carbon::now();
        $year = $currentDate->format('y');
        $month = $currentDate->month;
        $day = $currentDate->day;

        $maxId = InvComputer::max('id');

        if (is_null($maxId)) {
            $maxId = 0;
        }

        $uniqueString = 'PPABIBCU' . $year . $month . $day . '-' . str_pad(($maxId % 10000) + 1, 2, '0', STR_PAD_LEFT);
        $request['computer_code'] = $uniqueString;
        // end generate code


        $invComputers_get_data = InvComputer::find($request->id);
        if (empty($invComputers_get_data)) {
            $invComputers = InvComputer::create($request->all());
            return response()->json($invComputers, 201);
        } else {
            $invComputers = InvComputer::firstWhere('id', $request->id)->update($request->all());
            return response()->json($invComputers, 201);
        }
    }

    public function show($id)
    {
        $invComputers = InvComputer::find($id);
        if (is_null($invComputers)) {
            return response()->json(['message' => 'Computers Data not found'], 404);
        }
        return response()->json($invComputers);
    }

    public function destroy($id)
    {
        $invComputers = InvComputer::find($id);
        if (is_null($invComputers)) {
            return response()->json(['message' => 'Computers Data not found'], 404);
        }
        $invComputers->delete();
        return response()->json(null, 204);
    }
}
