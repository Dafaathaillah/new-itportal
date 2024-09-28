<?php

namespace App\Http\Controllers;

use App\Models\InvAp;
use Carbon\Carbon;
use Dedoc\Scramble\Scramble;
use Illuminate\Container\Attributes\DB;
use Illuminate\Http\Request;
use Inertia\Inertia;

class InvApController extends Controller
{

    /**
     * Display a listing of Inventory Access Point
     * @response InvAp[]
     */

    public function index()
    {
        $dataInventory = InvAp::all();
        return Inertia::render('Inventory/AccessPoint/AccessPoint', ['accessPoint' => $dataInventory]);
    }

    public function create()
    {
        return Inertia::render('Inventory/AccessPoint/AccessPointCreate');
    }

    public function store(Request $request)
    {
        // // start generate code
        // $currentDate = Carbon::now();
        // $year = $currentDate->format('y');
        // $month = $currentDate->month;
        // $day = $currentDate->day;

        // $maxId = InvAp::max('id');

        // if (is_null($maxId)) {
        //     $maxId = 0;
        // }

        // $uniqueString = 'PPABIBAP' . $year . $month . $day . '-' . str_pad(($maxId % 10000) + 1, 2, '0', STR_PAD_LEFT);
        // $request['inventory_number'] = $uniqueString;
        // // end generate code
        $params = $request->all();
        $data = [
            'device_name' => $params['device_name'],
            'inventory_number' => $params['inventory_number'],
            'serial_number' => $params['serial_number'],
            'ip_address' => $params['ip_address'],
            'device_brand' => $params['device_brand'],
            'device_type' => $params['device_type'],
            'device_model' => $params['device_model'],
            'location' => $params['location'],
            'status' => $params['status'],
            'note' => $params['note'],
        ];
        // DB::table('inv_aps')->insert($data);
        InvAp::create($data);
        return redirect()->route('accessPoint.page');
    }

    public function edit($apId)
    {
        $accessPoint = InvAp::find($apId);
        // return response()->json(['ap' => $accessPoint]);
        return Inertia::render('Inventory/AccessPoint/AccessPointEdit', ['accessPoint' => $accessPoint]);
    }

    public function show($id)
    {
        $invap = InvAp::find($id);
        if (is_null($invap)) {
            return response()->json(['message' => 'AP Device not found'], 404);
        }
        return response()->json($invap);
    }

    public function update(Request $request)
    {
        $params = $request->all();
        $data = [
            'device_name' => $params['device_name'],
            'inventory_number' => $params['inventory_number'],
            'serial_number' => $params['serial_number'],
            'ip_address' => $params['ip_address'],
            'device_brand' => $params['device_brand'],
            'device_type' => $params['device_type'],
            'device_model' => $params['device_model'],
            'location' => $params['location'],
            'status' => $params['status'],
            'note' => $params['note'],
        ];
        // DB::table('inv_aps')->insert($data);
        InvAp::firstWhere('id', $request->id)->update($data);
        return redirect()->route('accessPoint.page');
    }

    public function destroy($apId)
    {
        $accessPoint = InvAp::find($apId);
        // return response()->json(['ap' => $accessPoint]);
        $accessPoint->delete();
        return redirect()->back();
    }
}
