<?php

namespace App\Http\Controllers;

use App\Models\InvSwitch;
use Carbon\Carbon;
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
        // start generate code
        $currentDate = Carbon::now();
        $year = $currentDate->format('y');
        $month = $currentDate->month;
        $day = $currentDate->day;

        $maxId = InvSwitch::max('id');

        if (is_null($maxId)) {
            $maxId = 0;
        }

        $uniqueString = 'PPABIBSW' . $year . $month . $day . '-' . str_pad(($maxId % 10000) + 1, 2, '0', STR_PAD_LEFT);
        $request['inventory_number'] = $uniqueString;
        // end generate code

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
