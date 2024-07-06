<?php

namespace App\Http\Controllers;

use App\Models\InvLaptop;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InvLaptopController extends Controller
{
    public function index()
    {
        $invLaptop = InvLaptop::all();
        return response()->json($invLaptop);
    }

    public function store(Request $request)
    {
        // start generate code
        $currentDate = Carbon::now();
        $year = $currentDate->format('y');
        $month = $currentDate->month;
        $day = $currentDate->day;

        $maxId = InvLaptop::max('id');

        if (is_null($maxId)) {
            $maxId = 0;
        }

        $uniqueString = 'PPABIBNB' . $year . $month . $day . '-' . str_pad(($maxId % 10000) + 1, 2, '0', STR_PAD_LEFT);
        $request['laptop_code'] = $uniqueString;
        // end generate code

        $invLaptop_get_data = InvLaptop::find($request->id);
        if (empty($invLaptop_get_data)) {
            $invLaptop = InvLaptop::create($request->all());
            return response()->json($invLaptop, 201);
        } else {
            $invLaptop = InvLaptop::firstWhere('id', $request->id)->update($request->all());
            return response()->json($invLaptop, 201);
        }
    }

    public function show($id)
    {
        $invLaptop = InvLaptop::find($id);
        if (is_null($invLaptop)) {
            return response()->json(['message' => 'Laptop Data not found'], 404);
        }
        return response()->json($invLaptop);
    }

    public function destroy($id)
    {
        $invLaptop = InvLaptop::find($id);
        if (is_null($invLaptop)) {
            return response()->json(['message' => 'Laptop Data not found'], 404);
        }
        $invLaptop->delete();
        return response()->json(null, 204);
    }
}
