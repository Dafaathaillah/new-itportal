<?php

namespace App\Http\Controllers;

use App\Models\PerangkatBreakdown;
use App\Models\UnscheduleJob;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UnscheduleJobController extends Controller
{
    public function index()
    {
        $unscheduleJob = UnscheduleJob::all();
        return response()->json($unscheduleJob);
    }

    public function store(Request $request)
    {
        // start generate code
        $currentDate = Carbon::now();
        $year = $currentDate->format('y');
        $month = $currentDate->month;
        $day = $currentDate->day;

        $maxId = UnscheduleJob::max('id');

        if (is_null($maxId)) {
            $maxId = 0;
        }
        
        
        $uniqueString = 'UNSCHEDULE' . '-' . str_pad(($maxId % 10000) + 1, 2, '0', STR_PAD_LEFT);
        $request['activity_code'] = $uniqueString;
        // end generate code
        
        $data_inv_laptop = DB::table('inv_laptops')->where('laptop_code', $request->inventory_number)->first();
        
        if (!empty($request->inventory_number)) {
            $data_perangkat_breakdown = DB::table('perangkat_breakdowns')->where('inventory_number', $request->inventory_number)->first();
            $data_laptop = DB::table('inv_laptops')->where('laptop_code', $request->inventory_number)->first();
            $data_komputer = DB::table('inv_computers')->where('computer_code', $request->inventory_number)->first();
            $data_printer = DB::table('inv_printers')->where('printer_code', $request->inventory_number)->first();
            
            if (!empty($data_laptop)) {
                $device_category = 'Laptop';
                $device_name = $data_laptop->laptop_name;
            }elseif (!empty($data_komputer)) {
                $device_category = 'Komputer';
                $device_name = $data_komputer->computer_name;
            }else{
                $device_category = 'Printer';
                $device_name = $data_printer->item_name;
            }
            
            if (empty($data_perangkat_breakdown)) {
                $validatedDataPerangkatBreakdown = $request->validate([
                    'inventory_number' => 'nullable|string|max:255',
                    'start_progress' => 'nullable|date_format:Y-m-d H:i:s',
                    'end_progress' => 'nullable|date_format:Y-m-d H:i:s',
                    'location' => 'nullable|string|max:255',
                    'root_cause' => 'nullable|string|max:255',
                    'root_cause_category' => 'nullable|string|max:255',
                    'status' => 'nullable|string|max:255',
                ]);
                $date = Carbon::now();
                $month = $date->format('m');
                $year = $date->format('Y');
                
                $validatedDataPerangkatBreakdown['device_category'] = $device_category;
                // dd($validatedDataPerangkatBreakdown['device_category']);
                
                $validatedDataPerangkatBreakdown['device_name'] = $device_name;
                $validatedDataPerangkatBreakdown['month'] = $month;
                $validatedDataPerangkatBreakdown['created_date'] = $date;
                $validatedDataPerangkatBreakdown['year'] = $year;
                $validatedDataPerangkatBreakdown['pic'] = Auth::user()->name;
                $data_unschedule_create = $request->all();
    
                $perangkatBreakdown = PerangkatBreakdown::create($validatedDataPerangkatBreakdown);
                $unscheduleJob = UnscheduleJob::create($data_unschedule_create);
                return response()->json(['message' => 'Berhasil create data perangkat breakdown dan unschedule'], 201);
            }else{
                $validatedDataPerangkatBreakdown = $request->validate([
                    'inventory_number' => 'nullable|string|max:255',
                    'start_progress' => 'nullable|date_format:Y-m-d H:i:s',
                    'end_progress' => 'nullable|date_format:Y-m-d H:i:s',
                    'location' => 'nullable|string|max:255',
                    'root_cause' => 'nullable|string|max:255',
                    'root_cause_category' => 'nullable|string|max:255',
                    'status' => 'nullable|string|max:255',
                ]);
                $date = Carbon::now();
                $month = $date->format('m');
                $year = $date->format('Y');
    
                $validatedDataPerangkatBreakdown['device_category'] = $request->category;
                $validatedDataPerangkatBreakdown['device_name'] = $data_inv_laptop->laptop_name;
                $validatedDataPerangkatBreakdown['month'] = $month;
                $validatedDataPerangkatBreakdown['created_date'] = $date;
                $validatedDataPerangkatBreakdown['year'] = $year;
                $validatedDataPerangkatBreakdown['pic'] = Auth::user()->name;

                $perangkatBreakdown = PerangkatBreakdown::firstWhere('inventory_number', $request->inventory_number)->update($validatedDataPerangkatBreakdown);
                $unscheduleJob = UnscheduleJob::firstWhere('id', $request->id)->update($request->all());
                return response()->json(['message' => ' data perangkat breakdown dan unschedule berhasil di update'], 201);
            }

        } else {
            $unscheduleJob_get_data = UnscheduleJob::find($request->id);
            if (empty($unscheduleJob_get_data)) {
                $unscheduleJob = UnscheduleJob::create($request->all());
                return response()->json($unscheduleJob, 201);
            } else {
                $unscheduleJob = UnscheduleJob::firstWhere('id', $request->id)->update($request->all());
                return response()->json($unscheduleJob, 201);
            }
        }
    }

    // get data per user login/auth
    public function getDataUserLogin()
    {
        $request = 'MUHAMMAD MUDJAKIR';
        // $searchTerm = $request->query('crew');

        $users = UnscheduleJob::where('crew', 'like', '%' . $request . '%')->get();

        return response()->json($users);
    }

    public function show($id)
    {
        $unscheduleJob = UnscheduleJob::find($id);
        if (is_null($unscheduleJob)) {
            return response()->json(['message' => 'Unshedule Job Data not found'], 404);
        }
        return response()->json($unscheduleJob);
    }

    public function destroy($id)
    {
        $unscheduleJob = UnscheduleJob::find($id);
        if (is_null($unscheduleJob)) {
            return response()->json(['message' => 'Unshedule Job Data not found'], 404);
        }
        $unscheduleJob->delete();
        return response()->json(null, 204);
    }
}
