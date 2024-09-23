<?php

namespace App\Http\Controllers;

use App\Models\InvAp;
use Carbon\Carbon;
use Dedoc\Scramble\Scramble;
use Illuminate\Http\Request;

class InvApController extends Controller
{

    /**
     * Display a listing of Inventory Access Point
     * @response InvAp[]
     */

    public function index()
    {
        $invap = InvAp::all();
        return response()->json($invap);
    }

    public function store(Request $request)
    {
        Scramble::ignoreDefaultRoutes();

        // start generate code
        $currentDate = Carbon::now();
        $year = $currentDate->format('y');
        $month = $currentDate->month;
        $day = $currentDate->day;

        $maxId = InvAp::max('id');

        if (is_null($maxId)) {
            $maxId = 0;
        }

        $uniqueString = 'PPABIBAP' . $year . $month . $day . '-' . str_pad(($maxId % 10000) + 1, 2, '0', STR_PAD_LEFT);
        $request['inventory_number'] = $uniqueString;
        // end generate code

        $invap_get_data = InvAp::find($request->id);
        if (empty($invap_get_data)) {
            $invap = InvAp::create($request->all());
            return response()->json($invap, 201);
        } else {
            $invap = InvAp::firstWhere('id', $request->id)->update($request->all());
            return response()->json($invap, 201);
        }
    }

    public function show($id)
    {
        $invap = InvAp::find($id);
        if (is_null($invap)) {
            return response()->json(['message' => 'AP Device not found'], 404);
        }
        return response()->json($invap);
    }

    public function destroy($id)
    {
        $invap = InvAp::find($id);
        if (is_null($invap)) {
            return response()->json(['message' => 'AP Device not found'], 404);
        }
        $invap->delete();
        return response()->json(null, 204);
    }
}
