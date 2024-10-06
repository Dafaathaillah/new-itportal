<?php

namespace App\Http\Controllers;

use App\Models\InvLaptop;
use Carbon\Carbon;
use Dedoc\Scramble\Scramble;
use Illuminate\Container\Attributes\DB;
use Illuminate\Http\Request;
use Inertia\Inertia;
use League\Csv\Reader;
use Maatwebsite\Excel\Facades\Excel;

class InvLaptopController extends Controller
{
    public function index()
    {
        $dataInventory = InvLaptop::all();
        return Inertia::render('Inventory/Laptop/Laptop', ['laptop' => $dataInventory]);
    }

    public function create()
    {
        // start generate code
        $currentDate = Carbon::tomorrow();
        $year = $currentDate->format('y');
        $month = $currentDate->month;
        $day = $currentDate->day;

        $maxId = InvLaptop::max('max_id');

        if (is_null($maxId)) {
            $maxId = 0;
        }

        $uniqueString = 'PPABIBNB' . $year . $month . $day . '-' . str_pad(($maxId % 10000) + 1, 2, '0', STR_PAD_LEFT);
        $request['inventory_number'] = $uniqueString;
        // end generate code

        return Inertia::render('Inventory/Laptop/LaptopCreate', ['inventoryNumber' => $uniqueString]);
    }

    public function store(Request $request)
    {
        $maxId = InvLaptop::max('max_id');
        if (is_null($maxId)) {
            $maxId = 1;
        } else {
            $maxId = $maxId + 1;
        }
        $params = $request->all();
        $data = [
            'max_id' => $maxId,
            'laptop_name' => $params['laptop_name'],
            'laptop_code' => $params['laptop_code'],
            'number_asset_ho' => $params['number_asset_ho'],
            'assets_category' => $params['assets_category'],
            'spesifikasi' => $params['model'] . ', ' . $params['processor'] . ', ' . $params['hdd'] . ', ' . $params['ssd'] . ', ' . $params['ram'] . ', ' . $params['vga'] . ', ' . $params['warna_laptop'] . ', ' . $params['os_laptop'],
            'serial_number' => $params['serial_number'],
            'aplikasi' => $params['aplikasi'],
            'license' => $params['license'],
            'ip_address' => $params['ip_address'],
            'date_of_inventory' => $params['date_of_inventory'],
            'date_of_deploy' => $params['date_of_deploy'],
            'location' => $params['location'],
            'status' => $params['status'],
            'condition' => $params['condition'],
            'note' => $params['note'],
            'link_documentation_asset_image' => $params['link_documentation_asset_image'],
            'user_alls_id' => $params['user_alls_id'],
        ];
        // dd($data);
        // DB::table('inv_aps')->insert($data);
        InvLaptop::create($data);
        return redirect()->route('accessPoint.page');
    }

    public function uploadCsv(Request $request)
    {
        try {

            Excel::import(new ImportAp, $request->file('file'));
            return redirect()->route('accessPoint.page');
        } catch (\Exception $ex) {
            Log::info($ex);
            return response()->json(['data' => 'Some error has occur.', 400]);
        }
    }

    public function edit($apId)
    {
        $laptop = InvLaptop::find($apId);
        // return response()->json(['ap' => $laptop]);
        return Inertia::render('Inventory/Laptop/LaptopEdit', ['laptop' => $laptop]);
    }

    public function show($id)
    {
        $invap = InvLaptop::find($id);
        if (is_null($invap)) {
            return response()->json(['message' => 'Laptop Data not found'], 404);
        }
        return response()->json($invap);
    }

    public function update(Request $request)
    {
        $params = $request->all();
        $data = [
            'laptop_name' => $params['laptop_name'],
            'laptop_code' => $params['laptop_code'],
            'number_asset_ho' => $params['number_asset_ho'],
            'assets_category' => $params['assets_category'],
            'spesifikasi' => $params['spesifikasi'],
            'serial_number' => $params['serial_number'],
            'aplikasi' => $params['aplikasi'],
            'license' => $params['license'],
            'ip_address' => $params['ip_address'],
            'date_of_inventory' => $params['date_of_inventory'],
            'date_of_deploy' => $params['date_of_deploy'],
            'location' => $params['location'],
            'status' => $params['status'],
            'condition' => $params['condition'],
            'note' => $params['note'],
            'link_documentation_asset_image' => $params['link_documentation_asset_image'],
            'user_alls_id' => $params['user_alls_id'],
        ];
        // DB::table('inv_aps')->insert($data);
        InvLaptop::firstWhere('id', $request->id)->update($data);
        return redirect()->route('accessPoint.page');
    }

    public function destroy($apId)
    {
        $laptop = InvLaptop::find($apId);
        // return response()->json(['ap' => $laptop]);
        $laptop->delete();
        return redirect()->back();
    }
}
