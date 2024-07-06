<?php

namespace App\Http\Controllers;

use App\Models\InvPrinter;
use Carbon\Carbon;
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

        // start generate code
        $currentDate = Carbon::now();
        $year = $currentDate->format('y');
        $month = $currentDate->month;
        $day = $currentDate->day;

        $maxId = InvPrinter::max('id');

        if (is_null($maxId)) {
            $maxId = 0;
        }

        $uniqueString = 'PPABIBPRT' . $year . $month . $day . '-' . str_pad(($maxId % 10000) + 1, 2, '0', STR_PAD_LEFT);
        $request['printer_code'] = $uniqueString;
        // end generate code

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
            return response()->json(['message' => 'Printers Data not found'], 404);
        }
        return response()->json($invPrinter);
    }

    public function destroy($id)
    {
        $invPrinter = InvPrinter::find($id);
        if (is_null($invPrinter)) {
            return response()->json(['message' => 'Printers Data not found'], 404);
        }
        $invPrinter->delete();
        return response()->json(null, 204);
    }
}
