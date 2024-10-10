<?php

namespace App\Http\Controllers;

use App\Imports\SwitchImport;
use App\Models\InvSwitch;
use Carbon\Carbon;
use Dedoc\Scramble\Scramble;
use Illuminate\Container\Attributes\DB;
use Illuminate\Http\Request;
use Inertia\Inertia;
use League\Csv\Reader;
use Maatwebsite\Excel\Facades\Excel;

class InvSwitchController extends Controller
{
    public function index()
    {
        $dataInventory = InvSwitch::all();
        return Inertia::render('Inventory/Switch/Switch', ['switch' => $dataInventory]);
    }

    public function create()
    {
        // start generate code
        $currentDate = Carbon::now();
        $year = $currentDate->format('y');
        $month = $currentDate->month;
        $day = $currentDate->day;

        $maxId = InvSwitch::max('max_id');

        if (is_null($maxId)) {
            $maxId = 0;
        }

        $uniqueString = 'PPABIBSW' . str_pad(($maxId % 10000) + 1, 3, '0', STR_PAD_LEFT);
        $request['inventory_number'] = $uniqueString;
        // end generate code

        return Inertia::render('Inventory/Switch/SwitchCreate', ['inventoryNumber' => $uniqueString]);
    }

    public function store(Request $request)
    {
        $maxId = InvSwitch::max('max_id');
        if (is_null($maxId)) {
            $maxId = 1;
        }else{
            $maxId = $maxId + 1;
        }
        $params = $request->all();
        $data = [
            'max_id' => $maxId,
            'device_name' => $params['device_name'],
            'inventory_number' => $params['inventory_number'],
            'asset_ho_number' => $params['asset_ho_number'],
            'serial_number' => $params['serial_number'],
            'mac_address' => $params['mac_address'],
            'ip_address' => $params['ip_address'],
            'device_brand' => $params['device_brand'],
            'device_type' => $params['device_type'],
            'device_model' => $params['device_model'],
            'location' => $params['location'],
            'status' => $params['status'],
            'note' => $params['note'],
        ];
        // DB::table('inv_aps')->insert($data);
        InvSwitch::create($data);
        return redirect()->route('switch.page');
    }

    public function uploadCsv(Request $request)
    {
        try {

            Excel::import(new SwitchImport, $request->file('file'));
            return redirect()->route('switch.page');
        } catch (\Exception $ex) {
            Log::info($ex);
            return response()->json(['data' => 'Some error has occur.', 400]);
        }
    }

    public function edit($swId)
    {
        $switch = InvSwitch::find($swId);
        return Inertia::render('Inventory/Switch/SwitchEdit', ['switch' => $switch]);
    }

    public function update(Request $request)
    {
        $params = $request->all();
        $data = [
            'device_name' => $params['device_name'],
            'inventory_number' => $params['inventory_number'],
            'asset_ho_number' => $params['asset_ho_number'],
            'serial_number' => $params['serial_number'],
            'mac_address' => $params['mac_address'],
            'ip_address' => $params['ip_address'],
            'device_brand' => $params['device_brand'],
            'device_type' => $params['device_type'],
            'device_model' => $params['device_model'],
            'location' => $params['location'],
            'status' => $params['status'],
            'note' => $params['note'],
        ];
        InvSwitch::firstWhere('id', $request->id)->update($data);
        return redirect()->route('switch.page');
    }

    public function destroy($swId)
    {
        $switch = InvSwitch::find($swId);
        // return response()->json(['ap' => $switch]);
        $switch->delete();
        return redirect()->back();
    }
}
