<?php

namespace App\Http\Controllers;

use App\Models\InvWirelless;
use Carbon\Carbon;
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
        // start generate code
        $currentDate = Carbon::now();
        $year = $currentDate->format('y');
        $month = $currentDate->month;
        $day = $currentDate->day;

        $maxId = InvWirelless::max('id');

        if (is_null($maxId)) {
            $maxId = 0;
        }

        $uniqueString = 'PPABIBBB' . $year . $month . $day . '-' . str_pad(($maxId % 10000) + 1, 2, '0', STR_PAD_LEFT);
        $request['inventory_number'] = $uniqueString;
        // end generate code

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
