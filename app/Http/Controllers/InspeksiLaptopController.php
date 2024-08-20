<?php

namespace App\Http\Controllers;

use App\Models\InspeksiLaptop;
use App\Models\InvLaptop;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InspeksiLaptopController extends Controller
{
    public function cek_data()
    {
        // Mendapatkan tanggal awal dan akhir kuartal saat ini
        $data['now'] = Carbon::now();
        $data['quarterStart'] = $data['now']->copy()->firstOfQuarter()->format('Y-m-d');
        $data['quarterEnd'] = $data['now']->copy()->lastOfQuarter()->format(('Y-m-d'));

        // Mengambil data yang berada dalam rentang kuartal saat ini
        $data['inventories'] = InspeksiLaptop::whereBetween('created_date', [$data['quarterStart'], $data['quarterEnd']])->get();

        return response()->json($data);
    }
    public function index()
    {
        $inspeksi_laptop = InspeksiLaptop::all();
        return response()->json($inspeksi_laptop);
    }

    public function store(Request $request)
    {
        // start generate code
        $currentDate = Carbon::now();
        $year = $currentDate->format('Y');
        $month = $currentDate->month;
        $day = $currentDate->day;

        $maxId = InspeksiLaptop::max('id');

        if (is_null($maxId)) {
            $maxId = 0;
        }

        $uniqueString = 'PICA/NB/' . $year . '/' . str_pad(($maxId % 10000) + 1, 2, '0', STR_PAD_LEFT);
        // end generate code

        if (!empty($request->file('findings_image'))) {
            if (!empty($request->file('action_image'))) {
                //upload image
                $findings_image = $request->file('findings_image');
                $path_findings_image = $findings_image->store('images', 'public');
                $new_path_findings = 'storage/' . $path_findings_image;

                $action_image = $request->file('action_image');
                $path_action_image = $action_image->store('images', 'public');
                $new_path_action = 'storage/' . $path_action_image;

                $dataInspection = [
                    'inspection_status' => 'sudah_inspeksi',
                    'inspector' => 'user login',
                    'condition' => $request->condition,
                    'software_defrag' => $request->software_defrag,
                    'software_check_system_restore' => $request->software_check_system_restore,
                    'software_clean_cache_data' => $request->software_clean_cache_data,
                    'software_check_ilegal_software' => $request->software_check_ilegal_software,
                    'software_change_password' => $request->software_change_password,
                    'software_windows_license' => $request->software_windows_license,
                    'software_office_license' => $request->software_office_license,
                    'software_update_sinology' => $request->software_update_sinology,
                    'software_turn_off_windows_update' => $request->software_turn_off_windows_update,
                    'software_cheking_ssd_health' => $request->software_cheking_ssd_health,
                    'software_standaritation_device_name' => $request->software_standaritation_device_name,
                    'hardware_fan_cleaning' => $request->hardware_fan_cleaning,
                    'hardware_change_pasta' => $request->hardware_change_pasta,
                    'hardware_any_maintenance' => $request->hardware_any_maintenance,
                    'hardware_any_maintenance_explain' => $request->hardware_any_maintenance_explain,
                    'findings' => $request->findings,
                    'findings_action' => $request->findings_action,
                    'findings_status' => $request->findings_status,
                    'findings_image' => url($new_path_findings),
                    'action_image' => url($new_path_action),
                    'remarks' => $request->remarks,
                    'due_date' => $request->due_date,
                    'inventory_status' => $request->inventory_status,
                    'pica_number' => $uniqueString,
                    'created_date' => Carbon::now()->format('Y-m-d'),
                ];
                $data['udpateInspeksi'] = InspeksiLaptop::firstWhere('id', $request->id)->update($dataInspection);
            } else {
                //upload image
                $findings_image = $request->file('findings_image');
                $path_findings_image = $findings_image->store('images', 'public');
                $new_path_findings = 'storage/' . $path_findings_image;

                $dataInspection = [
                    'inspection_status' => 'sudah_inspeksi',
                    'inspector' => 'user login',
                    'condition' => $request->condition,
                    'software_defrag' => $request->software_defrag,
                    'software_check_system_restore' => $request->software_check_system_restore,
                    'software_clean_cache_data' => $request->software_clean_cache_data,
                    'software_check_ilegal_software' => $request->software_check_ilegal_software,
                    'software_change_password' => $request->software_change_password,
                    'software_windows_license' => $request->software_windows_license,
                    'software_office_license' => $request->software_office_license,
                    'software_update_sinology' => $request->software_update_sinology,
                    'software_turn_off_windows_update' => $request->software_turn_off_windows_update,
                    'software_cheking_ssd_health' => $request->software_cheking_ssd_health,
                    'software_standaritation_device_name' => $request->software_standaritation_device_name,
                    'hardware_fan_cleaning' => $request->hardware_fan_cleaning,
                    'hardware_change_pasta' => $request->hardware_change_pasta,
                    'hardware_any_maintenance' => $request->hardware_any_maintenance,
                    'hardware_any_maintenance_explain' => $request->hardware_any_maintenance_explain,
                    'findings' => $request->findings,
                    'findings_status' => $request->findings_status,
                    'findings_image' => url($new_path_findings),
                    'remarks' => $request->remarks,
                    'due_date' => $request->due_date,
                    'inventory_status' => $request->inventory_status,
                    'pica_number' => $uniqueString,
                    'created_date' => Carbon::now()->format('Y-m-d'),
                ];
            }
            $data['udpateInspeksi'] = InspeksiLaptop::firstWhere('id', $request->id)->update($dataInspection);
        } else {
            if (!empty($request->file('action_image'))) {
                //upload image
                $action_image = $request->file('action_image');
                $path_action_image = $action_image->store('images', 'public');
                $new_path_action = 'storage/' . $path_action_image;

                $dataInspection = [
                    'inspection_status' => 'sudah_inspeksi',
                    'inspector' => 'user login',
                    'condition' => $request->condition,
                    'software_defrag' => $request->software_defrag,
                    'software_check_system_restore' => $request->software_check_system_restore,
                    'software_clean_cache_data' => $request->software_clean_cache_data,
                    'software_check_ilegal_software' => $request->software_check_ilegal_software,
                    'software_change_password' => $request->software_change_password,
                    'software_windows_license' => $request->software_windows_license,
                    'software_office_license' => $request->software_office_license,
                    'software_update_sinology' => $request->software_update_sinology,
                    'software_turn_off_windows_update' => $request->software_turn_off_windows_update,
                    'software_cheking_ssd_health' => $request->software_cheking_ssd_health,
                    'software_standaritation_device_name' => $request->software_standaritation_device_name,
                    'hardware_fan_cleaning' => $request->hardware_fan_cleaning,
                    'hardware_change_pasta' => $request->hardware_change_pasta,
                    'hardware_any_maintenance' => $request->hardware_any_maintenance,
                    'hardware_any_maintenance_explain' => $request->hardware_any_maintenance_explain,
                    'findings_action' => $request->findings_action,
                    'findings_status' => $request->findings_status,
                    'action_image' => url($new_path_action),
                    'remarks' => $request->remarks,
                    'due_date' => $request->due_date,
                    'inventory_status' => $request->inventory_status,
                    'pica_number' => $uniqueString,
                    'created_date' => Carbon::now()->format('Y-m-d'),
                ];
                $data['udpateInspeksi'] = InspeksiLaptop::firstWhere('id', $request->id)->update($dataInspection);
            } else {

                $dataInspection = [
                    'inspection_status' => 'sudah_inspeksi',
                    'inspector' => 'user login',
                    'condition' => $request->condition,
                    'software_defrag' => $request->software_defrag,
                    'software_check_system_restore' => $request->software_check_system_restore,
                    'software_clean_cache_data' => $request->software_clean_cache_data,
                    'software_check_ilegal_software' => $request->software_check_ilegal_software,
                    'software_change_password' => $request->software_change_password,
                    'software_windows_license' => $request->software_windows_license,
                    'software_office_license' => $request->software_office_license,
                    'software_update_sinology' => $request->software_update_sinology,
                    'software_turn_off_windows_update' => $request->software_turn_off_windows_update,
                    'software_cheking_ssd_health' => $request->software_cheking_ssd_health,
                    'software_standaritation_device_name' => $request->software_standaritation_device_name,
                    'hardware_fan_cleaning' => $request->hardware_fan_cleaning,
                    'hardware_change_pasta' => $request->hardware_change_pasta,
                    'hardware_any_maintenance' => $request->hardware_any_maintenance,
                    'hardware_any_maintenance_explain' => $request->hardware_any_maintenance_explain,
                    'remarks' => $request->remarks,
                    'inventory_status' => $request->inventory_status,
                    'pica_number' => $uniqueString,
                    'created_date' => Carbon::now()->format('Y-m-d'),
                ];
            }
            $data['udpateInspeksi'] = InspeksiLaptop::firstWhere('id', $request->id)->update($dataInspection);
        }

        if (!empty($request->inventory_status)) {
            $getDataInspeksi = InspeksiLaptop::where('id', $request->id)->first();
            $getDataInventory = InvLaptop::where('id', $getDataInspeksi->inv_laptop_id)->first();
            $dataInventory = [
                'status' => $request->inventory_status,
            ];
            $data['udpateInspeksi'] = InvLaptop::firstWhere('id', $getDataInventory->id)->update($dataInventory);
        }
        return response()->json($dataInspection, 201);
    }

    public function approval(Request $request)
    {
        $dataCheckStatusInspeksi = InspeksiLaptop::where('id', $request->id)->value('inspection_status');
        if ($dataCheckStatusInspeksi == 'sudah_inspeksi') {
            if ($request->approvalType == 'accept') {
                $dataApproval = [
                    'approved_by' => Auth::user()->name,
                    'status_approval' => 'approve',
                ];
            } else {
                $dataApproval = [
                    'approved_by' => Auth::user()->name,
                    'status_approval' => 'reject',
                ];
            }
            $data['udpateInspeksiApproval'] = InspeksiLaptop::where('id', $request->id)->update($dataApproval);
            return response()->json($data);
        }else{
            return response()->json(['message' => 'data ini belum di inspeksi']);
        }
    }

    public function approvalAll(Request $request)
    {
        $yearNow = Carbon::now()->format('Y');

        if ($request->approvalType == 'accept') {
            $dataApproval = [
                'approved_by' => Auth::user()->name,
                'status_approval' => 'approve',
            ];
        } else {
            $dataApproval = [
                'approved_by' => Auth::user()->name,
                'status_approval' => 'reject',
            ];
        }
        $data['udpateInspeksiApprovalAll'] = InspeksiLaptop::where('year', $yearNow)->where('inspection_status', 'sudah_inspeksi')->update($dataApproval);
        return response()->json(['message' => 'Approve all updated successfully']);
    }

    public function show($id)
    {
        $inspeksi_laptop = InspeksiLaptop::find($id);
        if (is_null($inspeksi_laptop)) {
            return response()->json(['message' => 'Panelbox Data not found'], 404);
        }
        return response()->json($inspeksi_laptop);
    }

    public function destroy($id)
    {
        $inspeksi_laptop = InspeksiLaptop::find($id);
        if (is_null($inspeksi_laptop)) {
            return response()->json(['message' => 'Panelbox Data not found'], 404);
        }
        $inspeksi_laptop->delete();
        return response()->json(['message' => 'Data has deleted'], 204);
    }
}
