<?php

namespace App\Http\Controllers;

use App\Models\InspeksiComputer;
use App\Models\InvComputer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InspeksiComputerController extends Controller
{

    public function cek_data()
    {
        // Mendapatkan tanggal awal dan akhir kuartal saat ini
        $data['now'] = Carbon::now();
        $data['quarterStart'] = $data['now']->copy()->firstOfQuarter()->format('Y-m-d');
        $data['quarterEnd'] = $data['now']->copy()->lastOfQuarter()->format(('Y-m-d'));

        // Mengambil data yang berada dalam rentang kuartal saat ini
        $data['inventories'] = InspeksiComputer::whereBetween('created_date', [$data['quarterStart'], $data['quarterEnd']])->get();

        return response()->json($data);
    }
    public function index()
    {
        $inspeksi_computer = InspeksiComputer::all();
        return response()->json($inspeksi_computer);
    }

    public function store(Request $request)
    {
        // start generate code
        $currentDate = Carbon::now();
        $year = $currentDate->format('Y');
        $month = $currentDate->month;
        $day = $currentDate->day;

        $maxId = InspeksiComputer::max('id');

        if (is_null($maxId)) {
            $maxId = 0;
        }

        $uniqueString = 'PICA/CU/' . $year . '/' . str_pad(($maxId % 10000) + 1, 2, '0', STR_PAD_LEFT);
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
                    'physique_condition_cpu' => $request->physique_condition_cpu,
                    'physique_condition_monitor' => $request->physique_condition_monitor,
                    'software_license' => $request->software_license,
                    'software_standaritation' => $request->software_standaritation,
                    'software_clear_cache' => $request->software_clear_cache,
                    'software_system_restore' => $request->software_system_restore,
                    'defrag' => $request->defrag,
                    'hard_maintenance' => $request->hard_maintenance,
                    'crew' => $request->crew,
                    'findings' => $request->findings,
                    'findings_action' => $request->findings_action,
                    'findings_status' => $request->findings_status,
                    'findings_image' => url($new_path_findings),
                    'action_image' => url($new_path_action),
                    'remarks' => $request->remarks,
                    'due_date' => $request->due_date,
                    'conditions' => $request->conditions,
                    'inventory_status' => $request->inventory_status,
                    'ip_address' => $request->ip_address,
                    'location' => $request->location,
                    'pica_number' => $uniqueString,
                    'created_date' => Carbon::now()->format('Y-m-d'),
                ];
                $data['udpateInspeksi'] = InspeksiComputer::firstWhere('id', $request->id)->update($dataInspection);
            } else {
                //upload image
                $findings_image = $request->file('findings_image');
                $path_findings_image = $findings_image->store('images', 'public');
                $new_path_findings = 'storage/' . $path_findings_image;

                $dataInspection = [
                    'inspection_status' => 'sudah_inspeksi',
                    'inspector' => 'user login',
                    'physique_condition_cpu' => $request->physique_condition_cpu,
                    'physique_condition_monitor' => $request->physique_condition_monitor,
                    'software_license' => $request->software_license,
                    'software_standaritation' => $request->software_standaritation,
                    'software_clear_cache' => $request->software_clear_cache,
                    'software_system_restore' => $request->software_system_restore,
                    'defrag' => $request->defrag,
                    'hard_maintenance' => $request->hard_maintenance,
                    'crew' => $request->crew,
                    'findings' => $request->findings,
                    'findings_status' => $request->findings_status,
                    'findings_image' => url($new_path_findings),
                    'remarks' => $request->remarks,
                    'due_date' => $request->due_date,
                    'conditions' => $request->conditions,
                    'inventory_status' => $request->inventory_status,
                    'ip_address' => $request->ip_address,
                    'location' => $request->location,
                    'pica_number' => $uniqueString,
                    'created_date' => Carbon::now()->format('Y-m-d'),
                ];
            }
            $data['udpateInspeksi'] = InspeksiComputer::firstWhere('id', $request->id)->update($dataInspection);
        } else {
            if (!empty($request->file('action_image'))) {
                //upload image
                $action_image = $request->file('action_image');
                $path_action_image = $action_image->store('images', 'public');
                $new_path_action = 'storage/' . $path_action_image;

                $dataInspection = [
                    'inspection_status' => 'sudah_inspeksi',
                    'inspector' => 'user login',
                    'physique_condition_cpu' => $request->physique_condition_cpu,
                    'physique_condition_monitor' => $request->physique_condition_monitor,
                    'software_license' => $request->software_license,
                    'software_standaritation' => $request->software_standaritation,
                    'software_clear_cache' => $request->software_clear_cache,
                    'software_system_restore' => $request->software_system_restore,
                    'defrag' => $request->defrag,
                    'hard_maintenance' => $request->hard_maintenance,
                    'crew' => $request->crew,
                    'findings_action' => $request->findings_action,
                    'findings_status' => $request->findings_status,
                    'action_image' => url($new_path_action),
                    'remarks' => $request->remarks,
                    'due_date' => $request->due_date,
                    'conditions' => $request->conditions,
                    'inventory_status' => $request->inventory_status,
                    'ip_address' => $request->ip_address,
                    'location' => $request->location,
                    'pica_number' => $uniqueString,
                    'created_date' => Carbon::now()->format('Y-m-d'),
                ];
                $data['udpateInspeksi'] = InspeksiComputer::firstWhere('id', $request->id)->update($dataInspection);
            } else {
             
                $dataInspection = [
                    'inspection_status' => 'sudah_inspeksi',
                    'inspector' => 'user login',
                    'physique_condition_cpu' => $request->physique_condition_cpu,
                    'physique_condition_monitor' => $request->physique_condition_monitor,
                    'software_license' => $request->software_license,
                    'software_standaritation' => $request->software_standaritation,
                    'software_clear_cache' => $request->software_clear_cache,
                    'software_system_restore' => $request->software_system_restore,
                    'defrag' => $request->defrag,
                    'hard_maintenance' => $request->hard_maintenance,
                    'crew' => $request->crew,
                    'remarks' => $request->remarks,
                    'due_date' => $request->due_date,
                    'conditions' => $request->conditions,
                    'inventory_status' => $request->inventory_status,
                    'ip_address' => $request->ip_address,
                    'location' => $request->location,
                    'pica_number' => $uniqueString,
                    'created_date' => Carbon::now()->format('Y-m-d'),
                ];
                
            }
            $data['udpateInspeksi'] = InspeksiComputer::firstWhere('id', $request->id)->update($dataInspection);
        }

        if (!empty($request->inventory_status)) {
            $getDataInspeksi = InspeksiComputer::where('id', $request->id)->first();
            $getDataInventory = InvComputer::where('id', $getDataInspeksi->inv_computer_id)->first();
            $dataInventory = [
                'status' => $request->inventory_status,
            ];
            $data['udpateInspeksi'] = InvComputer::firstWhere('id', $getDataInventory->id)->update($dataInventory);
        }
        return response()->json($dataInspection, 201);
    }

    public function approval(Request $request)
    {
        $dataCheckStatusInspeksi = InspeksiComputer::where('id', $request->id)->value('inspection_status');
        if ($dataCheckStatusInspeksi == 'sudah_inspeksi') {
            if ($request->approvalType == 'accept') {
                $dataApproveal = [
                    'approved_by' => Auth::user()->name,
                    'status_approval' => 'approve',
                ];
            } else {
                $dataApproveal = [
                    'approved_by' => Auth::user()->name,
                    'status_approval' => 'reject',
                ];
            }
            $data['udpateInspeksiApproval'] = InspeksiComputer::firstWhere('id', $request->id)->update($dataApproveal);
            return response()->json($data);
        }else{
            return response()->json(['message' => 'data ini belum di inspeksi']);
        }
    }

    public function approvalAll(Request $request)
    {
           // Mendapatkan tanggal awal dan akhir kuartal saat ini
           $data['now'] = Carbon::now();
           $data['quarterStart'] = $data['now']->copy()->firstOfQuarter()->format('Y-m-d');
           $data['quarterEnd'] = $data['now']->copy()->lastOfQuarter()->format(('Y-m-d'));
   
           // Mengambil data yang berada dalam rentang kuartal saat ini
           
           if ($request->approvalType == 'accept') {
               $dataApproveal = [
                'approved_by' => Auth::user()->name,
                'status_approval' => 'approve',
            ];
        } else {
            $dataApproveal = [
                'approved_by' => Auth::user()->name,
                'status_approval' => 'reject',
            ];
        }
        $data['inventories'] = InspeksiComputer::where('inspection_status', 'sudah_inspeksi')->whereBetween('created_date', [$data['quarterStart'], $data['quarterEnd']])->update($dataApproveal);
        return response()->json(['message' => 'Approve all updated successfully']);
    }

    public function show($id)
    {
        $inspeksi_computer = InspeksiComputer::find($id);
        if (is_null($inspeksi_computer)) {
            return response()->json(['message' => 'Panelbox Data not found'], 404);
        }
        return response()->json($inspeksi_computer);
    }

    public function destroy($id)
    {
        $inspeksi_computer = InspeksiComputer::find($id);
        if (is_null($inspeksi_computer)) {
            return response()->json(['message' => 'Panelbox Data not found'], 404);
        }
        $inspeksi_computer->delete();
        return response()->json(['message' => 'Data has deleted'], 204);
    }
}
