<?php

namespace App\Http\Controllers;

use App\Models\PerangkatBreakdown;
use App\Models\UnscheduleJob;
use Carbon\Carbon;
use Illuminate\Http\Request;
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
        
        $data_inv_laptop = DB::table('inv_laptops')->where('laptop_code', $request->inventory_number)->first();

        $uniqueString = 'UNSCHEDULE' . '-' . str_pad(($maxId % 10000) + 1, 2, '0', STR_PAD_LEFT);
        $request['activity_code'] = $uniqueString;
        // end generate code

        
        if (!empty($request->inventory_number)) {
            $data_perangkat_breakdown = DB::table('perangkat_breakdowns')->where('inventory_number', $request->inventory_number)->first();
            if (empty($data_perangkat_breakdown)) {
                $validatedDataPerangkatBreakdown = $request->validate([
                    'inventory_number' => 'nullable|string|max:255',
                    'start_progress' => 'nullable|string|max:255',
                    'end_progress' => 'nullable|string|max:255',
                    'location' => 'nullable|string|max:255',
                    'root_cause' => 'nullable|string|max:255',
                    'root_cause_category' => 'nullable|string|max:255',
                    'status' => 'nullable|string|max:255',
                    'laptop_loan_id' => 'nullable|string|max:255',
                ]);
                $date = Carbon::now();
                $month = $date->format('m');
                $year = $date->format('Y');
    
                $validatedDataPerangkatBreakdown['device_category'] = $request->category;
                $validatedDataPerangkatBreakdown['device_name'] = $data_inv_laptop->laptop_name;
                $validatedDataPerangkatBreakdown['month'] = $month;
                $validatedDataPerangkatBreakdown['year'] = $year;
                $validatedDataPerangkatBreakdown['pic'] = 'DAFA BINTANG ATHAILLAH';
                $data_unschedule_create = $request->all();
    
                $perangkatBreakdown = PerangkatBreakdown::create($validatedDataPerangkatBreakdown);
                $unscheduleJob = UnscheduleJob::create($data_unschedule_create);
                return response()->json(['message' => 'Berhasil create data perangkat breakdown dan unschedule'], 201);
            }else{
                $validatedDataPerangkatBreakdown = $request->validate([
                    'inventory_number' => 'nullable|string|max:255',
                    'start_progress' => 'required|date_format:Y-m-d H:i:s',
                    'end_progress' => 'required|date_format:Y-m-d H:i:s',
                    'location' => 'nullable|string|max:255',
                    'root_cause' => 'nullable|string|max:255',
                    'root_cause_category' => 'nullable|string|max:255',
                    'status' => 'nullable|string|max:255',
                    'laptop_loan_id' => 'nullable|string|max:255',
                ]);
                $date = Carbon::now();
                $month = $date->format('m');
                $year = $date->format('Y');
    
                $validatedDataPerangkatBreakdown['device_category'] = $request->category;
                $validatedDataPerangkatBreakdown['device_name'] = $data_inv_laptop->laptop_name;
                $validatedDataPerangkatBreakdown['month'] = $month;
                $validatedDataPerangkatBreakdown['year'] = $year;
                $validatedDataPerangkatBreakdown['pic'] = 'DAFA BINTANG ATHAILLAH';

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
    public function get_data_user_login()
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
