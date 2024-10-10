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

        $uniqueString = 'PPABIBNB' . str_pad(($maxId % 10000) + 1, 3, '0', STR_PAD_LEFT);
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

        $documentation_image = $request->file('image');
        $destinationPath = 'images/';
        $path_documentation_image = $documentation_image->store('images', 'public');
        $new_path_documentation_image = $path_documentation_image;
        $documentation_image->move($destinationPath, $new_path_documentation_image);

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
            'link_documentation_asset_image' => url($new_path_documentation_image),
            'user_alls_id' => $params['user_alls_id'],
        ];

        InvLaptop::create($data);
        return redirect()->route('laptop.page');
    }

    public function uploadCsv(Request $request)
    {
        try {

            Excel::import(new ImportAp, $request->file('file'));
            return redirect()->route('laptop.page');
        } catch (\Exception $ex) {
            Log::info($ex);
            return response()->json(['data' => 'Some error has occur.', 400]);
        }
    }

    public function edit($id)
    {
        $laptop = InvLaptop::find($id);
        $spesifikasi = explode(',', $laptop->spesifikasi);
        $model = trim($spesifikasi[0]);
        $processor = trim($spesifikasi[1]);
        $hdd = trim($spesifikasi[2]);
        $ssd = trim($spesifikasi[3]);
        $ram = trim($spesifikasi[4]);
        $vga = trim($spesifikasi[5]);
        $warna_laptop = trim($spesifikasi[6]);
        $os_laptop = trim($spesifikasi[7]);
        // return response()->json(['ap' => $laptop]);
        return Inertia::render('Inventory/Laptop/LaptopEdit', [
            'laptop' => $laptop,
            'model' => $model,
            'processor' => $processor,
            'hdd' => $hdd,
            'ssd' => $ssd,
            'ram' => $ram,
            'vga' => $vga,
            'warna_laptop' => $warna_laptop,
            'os_laptop' => $os_laptop,
        ]);
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
        $documentation_image = $request->file('image');
        $destinationPath = 'images/';
        $path_documentation_image = $documentation_image->store('images', 'public');
        $new_path_documentation_image = $path_documentation_image;
        $documentation_image->move($destinationPath, $new_path_documentation_image);

        $data = [
            'max_id' => $request->max_id,
            'laptop_name' => $request->laptop_name,
            'laptop_code' => $request->laptop_code,
            'number_asset_ho' => $request->number_asset_ho,
            'assets_category' => $request->assets_category,
            'spesifikasi' => $request->model . ', ' . $request->processor . ', ' . $request->hdd . ', ' . $request->ssd . ', ' . $request->ram . ', ' . $request->vga . ', ' . $request->warna_laptop . ', ' . $request->os_laptop,
            'serial_number' => $request->serial_number,
            'aplikasi' => $request->aplikasi,
            'license' => $request->license,
            'ip_address' => $request->ip_address,
            'date_of_inventory' => $request->date_of_inventory,
            'date_of_deploy' => $request->date_of_deploy,
            'location' => $request->location,
            'status' => $request->status,
            'condition' => $request->condition,
            'note' => $request->note,
            'link_documentation_asset_image' => url($new_path_documentation_image),
            'user_alls_id' => null,
        ];

        $test = InvLaptop::firstWhere('id', $request->id)->update($data);
        return redirect()->route('laptop.page');
    }
    public function destroy($id)
    {
        $laptop = InvLaptop::find($id);
        // return response()->json(['ap' => $laptop]);
        $laptop->delete();
        return redirect()->back();
    }
}
