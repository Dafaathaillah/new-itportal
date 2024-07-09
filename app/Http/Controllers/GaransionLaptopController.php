<?php

namespace App\Http\Controllers;

use App\Models\GaransionLaptop;
use App\Models\PerangkatBreakdown;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GaransionLaptopController extends Controller
{
    public function index()
    {
        $gransionLaptop = GaransionLaptop::all();
        return response()->json($gransionLaptop);
    }

    public function store(Request $request)
    {
        // start generate code
        $currentDate = Carbon::now();
        $year = $currentDate->format('y');
        $month = $currentDate->month;
        $day = $currentDate->day;

        $maxId = GaransionLaptop::max('id');

        if (is_null($maxId)) {
            $maxId = 0;
        }

        $uniqueString = 'GARANSI' . $year . $month . $day . '-' . str_pad(($maxId % 10000) + 1, 2, '0', STR_PAD_LEFT);
        $request['garansion_code'] = $uniqueString;
        // end generate code

        // $gransionLaptop_get_data = GaransionLaptop::find($request->id);
        // if (empty($gransionLaptop_get_data)) {

        //     $gransionLaptop = GaransionLaptop::create($request->all());
        //     return response()->json($gransionLaptop, 201);
        // } else {
        //     $gransionLaptop = GaransionLaptop::firstWhere('id', $request->id)->update($request->all());
        //     return response()->json($gransionLaptop, 201);
        // }
        
        $data_inv_laptop = DB::table('inv_laptops')->where('laptop_code', $request->inventory_number)->first();

        if (!empty($request->inventory_number)) {
            $data_perangkat_breakdown = DB::table('perangkat_breakdowns')->where('inventory_number', $request->inventory_number)->first();
            if (empty($data_perangkat_breakdown)) {
                $validatedDataPerangkatBreakdown = $request->validate([
                    'inventory_number' => 'nullable|string|max:255',
                    'start_progress' => 'nullable|date_format:Y-m-d H:i:s',
                    'end_progress' => 'nullable|date_format:Y-m-d H:i:s',
                    'status' => 'nullable|string|max:255',
                ]);
                $date = Carbon::now();
                $month = $date->format('m');
                $year = $date->format('Y');
    
                $validatedDataPerangkatBreakdown['garansion_laptop_code'] = $uniqueString;
                $validatedDataPerangkatBreakdown['pic'] = 'DAFA BINTANG ATHAILLAH';
                $validatedDataPerangkatBreakdown['month'] = $month;
                $validatedDataPerangkatBreakdown['year'] = $year;
                $dataGaransionAdd = $request->all();
                $dataGaransionAdd['month'] = $month;
                $dataGaransionAdd['year'] = $year;
                
                // return response()->json($validatedDataPerangkatBreakdown);
    
                $perangkatBreakdown = PerangkatBreakdown::create($validatedDataPerangkatBreakdown);
                $garansiLaptop = GaransionLaptop::create($dataGaransionAdd);
                return response()->json(['message' => 'Berhasil create data perangkat breakdown dan unschedule'], 201);
            }else{
                $validatedDataPerangkatBreakdown = $request->validate([
                    'inventory_number' => 'nullable|string|max:255',
                    'start_progress' => 'nullable|date_format:Y-m-d H:i:s',
                    'end_progress' => 'nullable|date_format:Y-m-d H:i:s',
                    'status' => 'nullable|string|max:255',
                ]);
                $date = Carbon::now();
                $month = $date->format('m');
                $year = $date->format('Y');
    
                $validatedDataPerangkatBreakdown['garansion_laptop_code'] = $uniqueString;
                $validatedDataPerangkatBreakdown['pic'] = 'DAFA BINTANG ATHAILLAH';

                $perangkatBreakdown = PerangkatBreakdown::firstWhere('inventory_number', $request->inventory_number)->update($validatedDataPerangkatBreakdown);
                $garansiLaptop = GaransionLaptop::firstWhere('id', $request->id)->update($request->all());
                return response()->json(['message' => ' data perangkat breakdown dan unschedule berhasil di update'], 201);
            }

        } else {
            $garansiLaptop_get_data = GaransionLaptop::find($request->id);
            if (empty($garansiLaptop_get_data)) {
                $garansiLaptop = GaransionLaptop::create($request->all());
                return response()->json($garansiLaptop, 201);
            } else {
                $garansiLaptop = GaransionLaptop::firstWhere('id', $request->id)->update($request->all());
                return response()->json($garansiLaptop, 201);
            }
        }
    }

    public function show($id)
    {
        $gransionLaptop = GaransionLaptop::find($id);
        if (is_null($gransionLaptop)) {
            return response()->json(['message' => 'Wirelless Device not found'], 404);
        }
        return response()->json($gransionLaptop);
    }

    public function destroy($id)
    {
        $gransionLaptop = GaransionLaptop::find($id);
        if (is_null($gransionLaptop)) {
            return response()->json(['message' => 'Wirelless Device not found'], 404);
        }
        $gransionLaptop->delete();
        return response()->json(null, 204);
    }
}
