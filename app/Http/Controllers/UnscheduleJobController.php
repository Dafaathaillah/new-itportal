<?php

namespace App\Http\Controllers;

use App\Models\UnscheduleJob;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UnscheduleJobController extends Controller
{
    public function index()
    {
        $unscheduleJob = UnscheduleJob::all();
        return response()->json($unscheduleJob);
    }

    public function store(Request $request)
    {
        $data = 
        // start generate code
        $currentDate = Carbon::now();
        $year = $currentDate->format('y');
        $month = $currentDate->month;
        $day = $currentDate->day;

        $maxId = UnscheduleJob::max('id');

        if (is_null($maxId)) {
            $maxId = 0;
        }

        $uniqueString = 'UNSCHEDULE'. '-' . str_pad(($maxId % 10000) + 1, 2, '0', STR_PAD_LEFT);
        $request['activity_code'] = $uniqueString;
        // end generate code

        $unscheduleJob_get_data = UnscheduleJob::find($request->id);
        if (empty($unscheduleJob_get_data)) {
            $unscheduleJob = UnscheduleJob::create($request->all());
            return response()->json($unscheduleJob, 201);
        } else {
            $unscheduleJob = UnscheduleJob::firstWhere('id', $request->id)->update($request->all());
            return response()->json($unscheduleJob, 201);
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
