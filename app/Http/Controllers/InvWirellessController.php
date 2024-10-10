<?php

namespace App\Http\Controllers;

use App\Imports\WirellessImport;
use App\Models\InvWirelless;
use Carbon\Carbon;
use Dedoc\Scramble\Scramble;
use Illuminate\Container\Attributes\DB;
use Illuminate\Http\Request;
use Inertia\Inertia;
use League\Csv\Reader;
use Maatwebsite\Excel\Facades\Excel;

class InvWirellessController extends Controller
{
    public function index()
    {
        $dataInventory = InvWirelless::all();
        return Inertia::render('Inventory/Wirelless/Wirelless', ['wirelless' => $dataInventory]);
    }

    public function create()
    {
        // start generate code
        $currentDate = Carbon::now();
        $year = $currentDate->format('y');
        $month = $currentDate->month;
        $day = $currentDate->day;

        $maxId = InvWirelless::max('max_id');

        if (is_null($maxId)) {
            $maxId = 0;
        }

        $uniqueString = 'PPABIBSW' . str_pad(($maxId % 10000) + 1, 3, '0', STR_PAD_LEFT);
        $request['inventory_number'] = $uniqueString;
        // end generate code

        return Inertia::render('Inventory/Wirelless/WirellessCreate', ['inventoryNumber' => $uniqueString]);
    }

    public function store(Request $request)
    {
        $maxId = InvWirelless::max('max_id');
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
            'frequency' => $params['frequency'],
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
        InvWirelless::create($data);
        return redirect()->route('wirelless.page');
    }

    public function uploadCsv(Request $request)
    {
        try {

            Excel::import(new WirellessImport, $request->file('file'));
            return redirect()->route('wirelless.page');
        } catch (\Exception $ex) {
            Log::info($ex);
            return response()->json(['data' => 'Some error has occur.', 400]);
        }
    }

    public function edit($id)
    {
        $wirelless = InvWirelless::find($id);
        return Inertia::render('Inventory/Wirelless/WirellessEdit', ['wirelless' => $wirelless]);
    }

    public function update(Request $request)
    {
        $params = $request->all();
        $data = [
            'device_name' => $params['device_name'],
            'inventory_number' => $params['inventory_number'],
            'asset_ho_number' => $params['asset_ho_number'],
            'serial_number' => $params['serial_number'],
            'frequency' => $params['frequency'],
            'mac_address' => $params['mac_address'],
            'ip_address' => $params['ip_address'],
            'device_brand' => $params['device_brand'],
            'device_type' => $params['device_type'],
            'device_model' => $params['device_model'],
            'location' => $params['location'],
            'status' => $params['status'],
            'note' => $params['note'],
        ];
        InvWirelless::firstWhere('id', $request->id)->update($data);
        return redirect()->route('wirelless.page');
    }

    public function destroy($id)
    {
        $wirelless = InvWirelless::find($id);
        // return response()->json(['ap' => $wirelless]);
        $wirelless->delete();
        return redirect()->back();
    }
}
