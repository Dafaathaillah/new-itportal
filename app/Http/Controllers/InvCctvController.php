<?php

namespace App\Http\Controllers;

use App\Models\InvCctv;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InvCctvController extends Controller
{
    public function index()
    {
        $invCctv = InvCctv::all();
        return response()->json($invCctv);
    }

    public function store(Request $request)
    {
        // start generate code
        $currentDate = Carbon::now();
        $year = $currentDate->format('y');
        $month = $currentDate->month;
        $day = $currentDate->day;

        $maxId = InvCctv::max('id');

        if (is_null($maxId)) {
            $maxId = 0;
        }

        $uniqueString = 'PPABIBCCTV' . $year . $month . $day . '-' . str_pad(($maxId % 10000) + 1, 2, '0', STR_PAD_LEFT);
        $request['cctv_code'] = $uniqueString;
        // end generate code

        $invCctv_get_data = InvCctv::find($request->id);
        if (empty($invCctv_get_data)) {
            $invCctv = InvCctv::create($request->all());
            return response()->json($invCctv, 201);
        } else {
            $invCctv = InvCctv::firstWhere('id', $request->id)->update($request->all());
            return response()->json($invCctv, 201);
        }
    }

    public function show($id)
    {
        $invCctv = InvCctv::find($id);
        if (is_null($invCctv)) {
            return response()->json(['message' => 'Cctv Device not found'], 404);
        }
        return response()->json($invCctv);
    }

    public function destroy($id)
    {
        $invCctv = InvCctv::find($id);
        if (is_null($invCctv)) {
            return response()->json(['message' => 'Cctv Device not found'], 404);
        }
        $invCctv->delete();
        return response()->json(null, 204);
    }
}
