<?php

namespace App\Http\Controllers;

use App\Models\Aduan;
use App\Models\UserAll;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AduanController extends Controller
{
    public function index()
    {
        $aduan = Aduan::all();
        return response()->json($aduan);
    }

    public function store(Request $request)
    {
        // start generate code
         $currentDate = Carbon::now();
         $year = $currentDate->format('y');
         $month = $currentDate->month;
         $day = $currentDate->day;

         $maxId = Aduan::whereDate('created_at', $currentDate->format('Y-m-d'))->max('id');
 
         if (is_null($maxId)) {
             $maxId = 0;
         }
 
         $uniqueString = 'ADUAN-' . $year . $month . $day . '-' . str_pad(($maxId % 10000) + 1, 2, '0', STR_PAD_LEFT);
        // end generate code

        $validate = $request->validate([
            'nrp' => 'required|string|max:255',
            'complaint_name' => 'nullable|string',
            'complaint_note' => 'nullable|string',
            'phone_number' => 'nullable|string',
            'date_of_complaint' => 'nullable|date_format:Y-m-d H:i:s',
            'complaint_image' => 'nullable|string',
            'location' => 'nullable|string',
            'detail_location' => 'nullable|string',
            'category_name' => 'nullable|string',
            'crew' => 'nullable|string',
        ]);
        $validate['complaint_code'] = $uniqueString;

        $aduan_get_data_complaint = Aduan::find($request->id);
        if (empty($aduan_get_data_complaint)) {
            $aduan_get_data_user = UserAll::where('nrp', $request->nrp)->first();
            // return response()->json($aduan_get_data_user['position'], 201);
            $validate['complaint_position'] = $aduan_get_data_user['position'];
            $aduan = Aduan::create($validate);
            return response()->json($aduan, 201);
        } else {
            $validate_update = $request->validate([
                'nrp' => 'required|string|max:255',
                'complaint_name' => 'nullable|string',
                'complaint_note' => 'nullable|string',
                'phone_number' => 'nullable|string',
                'complaint_image' => 'nullable|string',
                'location' => 'nullable|string',
                'detail_location' => 'nullable|string',
                'category_name' => 'nullable|string',
            ]);
            $update_data_aduan = Aduan::firstWhere('id', $request->id)->update($validate_update);
            return response()->json($update_data_aduan, 201);
        }
    }

    public function update_aduan(Request $request)
    {
        // start get response time
        $aduan_get_data_complaint = Aduan::find($request->id);

        $task = Aduan::find($aduan_get_data_complaint->id);
        $date_of_complaint = new Carbon($task->date_of_complaint);
        $start_response = new Carbon($task->start_response);

        $diff = $date_of_complaint->diff($start_response);

        $hours = $diff->h;
        $minutes = $diff->i;
        $seconds = $diff->s;

        $diffInSeconds = $date_of_complaint->diffInSeconds($start_response);
        $formattedDiff = gmdate('H:i:s', $diffInSeconds);
        // end get response time

        $validate_closing = $request->validate([
            'repair_note' => 'required|string|max:255',
            'response_time' => $formattedDiff,
            'status' => 'nullable|string',
            'root_cause' => 'nullable|string',
            'action_repair' => 'nullable|string',
            'inventory_number' => 'nullable|string',
            'start_response' => 'nullable|date_format:Y-m-d H:i:s',
            'crew' => 'nullable|string',
            'start_progress' => 'nullable|date_format:Y-m-d H:i:s',
            'end_progress' => 'nullable|date_format:Y-m-d H:i:s',
        ]);

        $validate_closing['response_time'] = $formattedDiff;

        $closing_aduan = Aduan::firstWhere('id', $request->id)->update($validate_closing);
        return response()->json($validate_closing, 201);
    }

    public function show($id)
    {
        $aduan = Aduan::find($id);
        if (is_null($aduan)) {
            return response()->json(['message' => 'Aduan Data not found'], 404);
        }
        return response()->json($aduan);
    }

    public function destroy($id)
    {
        $aduan = Aduan::find($id);
        if (is_null($aduan)) {
            return response()->json(['message' => 'User All SIte Data not found'], 404);
        }
        $aduan->delete();
        return response()->json(null, 204);
    }
}
