<?php

namespace App\Http\Controllers;

use App\Models\InspeksiMobileTower;
use App\Models\InvMobileTower;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InspeksiMobileTowerController extends Controller
{
    public function index()
    {
        $inspeksiMobileTower = InspeksiMobileTower::all();
        return response()->json($inspeksiMobileTower);
    }

    public function store(Request $request)
    {
        // Gabungkan inputan menjadi satu string
        $crew = implode(', ', $request->crew);

        $physic_condition_mobile_tower = implode(', ', [
            $request['kondisi_skidding_dalam_keadaan_baik'],
            $request['kondisi_engsel_solpan_dalam_keadaan_baik'],
            $request['kondisi_engsel_pintu_dalam_keadaan_baik'],
            $request['kondisi_waarna_mt_dalam_keadaan_baik'],
            $request['terdapat_tali_untuk_moving_mt'],
            $request['kondisi_keberihan_sekitar_mt'],
            $request['stiker_kip'],
            $request['kondisi_tiang'],
            $request['kondisi_gembok_panel'],
        ]);

        $physic_condition_mobile_tower_text = implode(', ', [
            $request['kondisi_skidding_dalam_keadaan_baik_text'],
            $request['kondisi_engsel_solpan_dalam_keadaan_baik_text'],
            $request['kondisi_engsel_pintu_dalam_keadaan_baik_text'],
            $request['kondisi_waarna_mt_dalam_keadaan_baik_text'],
            $request['terdapat_tali_untuk_moving_mt_text'],
            $request['kondisi_keberihan_sekitar_mt_text'],
            $request['stiker_kip_text'],
            $request['kondisi_tiang_text'],
            $request['kondisi_gembok_panel_text'],
        ]);

        $battery_circuit = implode(', ', [
            $request['voltase_baterai'],
            $request['kabel_rangkaian_baterai'],
            $request['konektor_baterai'],
            $request['rangkaian_baterai'],
            $request['kondisi_kebersihan_box_baterai'],
            $request['box_baterai_dalam_keadaan_kering'],
        ]);

        $battery_circuit_text = implode(', ', [
            $request['voltase_baterai_text'],
            $request['kabel_rangkaian_baterai_text'],
            $request['konektor_baterai_text'],
            $request['rangkaian_baterai_text'],
            $request['kondisi_kebersihan_box_baterai_text'],
            $request['box_baterai_dalam_keadaan_kering_text'],
        ]);

        $solar_panel = implode(', ', [
            $request['voltase_yang_masuk_ke_mppt'],
            $request['kabel_rangkaian_solpan'],
            $request['sambungan_antar_solpan'],
            $request['kondisi_kebersihan_solpan'],
        ]);

        $solar_panel_text = implode(', ', [
            $request['voltase_yang_masuk_ke_mppt_text'],
            $request['kabel_rangkaian_solpan_text'],
            $request['sambungan_antar_solpan_text'],
            $request['kondisi_kebersihan_solpan_text'],
        ]);

        $device_circuit = implode(', ', [
            $request['kondisi_box_rangkaian'],
            $request['voltase_stepup'],
            $request['terdapat_mcb_yang_sesuai'],
            $request['kondisi_sambungan_kabel'],
        ]);

        $device_circuit_text = implode(', ', [
            $request['kondisi_box_rangkaian_text'],
            $request['voltase_stepup_text'],
            $request['terdapat_mcb_yang_sesuai_text'],
            $request['kondisi_sambungan_kabel_text'],
        ]);

        // start generate code
        $currentDate = Carbon::now();
        $year = $currentDate->format('Y');
        $month = $currentDate->month;
        $day = $currentDate->day;

        $maxId = InspeksiMobileTower::max('id');

        if (is_null($maxId)) {
            $maxId = 0;
        }

        $uniqueString = 'PICA/MT/' . $year . '/' . str_pad(($maxId % 10000) + 1, 2, '0', STR_PAD_LEFT);
        // end generate code

        if (!empty($request->file('findings_image'))) {
            if (!empty($request->file('action_image'))) {
                //temuan string array
                $findingArray = [];
                foreach ($request->findings as $finds) {
                    $findingArray[] = $finds;
                }
                $findingArrayString = implode(', ', $findingArray);

                //temuan action string array
                $findingActionArray = [];
                foreach ($request->findings_action as $action) {
                    $findingActionArray[] = $action;
                }
                $findingActionArrayString = implode(', ', $findingActionArray);

                //upload image
                $imageFindingPaths = [];
                foreach ($request->file('findings_image') as $findings_image) {
                    $path_findings_image = $findings_image->store('images', 'public');
                    $new_path_findings = 'storage/' . $path_findings_image;
                    $imageFindingPaths[] = url($new_path_findings);
                }
                $imagePathsFindingString = implode(', ', $imageFindingPaths);

                $imageActionPaths = [];
                foreach ($request->file('action_image') as $action_image) {
                    $path_action_image = $action_image->store('images', 'public');
                    $new_path_action = 'storage/' . $path_action_image;
                    $imageActionPaths[] = $new_path_action;
                }
                $imagePathsActionString = implode(', ', $imageActionPaths);

                $dataInspection = [
                    'inspection_status' => 'sudah_inspeksi',
                    'inspector' => 'user login',
                    'condition' => $request->condition,
                    'physic_condition_mobile_tower' => $physic_condition_mobile_tower,
                    'physic_condition_mobile_tower_text' => $physic_condition_mobile_tower_text,
                    'battery_circuit' => $battery_circuit,
                    'battery_circuit_text' => $battery_circuit_text,
                    'solar_panel' => $solar_panel,
                    'solar_panel_text' => $solar_panel_text,
                    'device_circuit_output' => $device_circuit,
                    'device_circuit_output_text' => $device_circuit_text,
                    'findings' => $findingArrayString,
                    'findings_action' => $findingActionArrayString,
                    'findings_status' => $request->findings_status,
                    'findings_image' => $imagePathsFindingString,
                    'action_image' => $imagePathsActionString,
                    'remarks' => $request->remarks,
                    'due_date' => $request->due_date,
                    'crew' => $crew,
                    'list_of_needs' => $request->list_of_needs,
                    'pica_number' => $uniqueString,
                    'created_date' => Carbon::now()->format('Y-m-d'),
                ];
                // return response()->json($dataInspection);
                $data['udpateInspeksi'] = InspeksiMobileTower::firstWhere('id', $request->id)->update($dataInspection);
            } else {

                //temuan string array
                $findingArray = [];
                foreach ($request->findings as $finds) {
                    $findingArray[] = $finds;
                }
                $findingArrayString = implode(', ', $findingArray);


                $imageFindingPaths = [];
                foreach ($request->file('findings_image') as $findings_image) {
                    $path_findings_image = $findings_image->store('images', 'public');
                    $new_path_findings = 'storage/' . $path_findings_image;
                    $imageFindingPaths[] = url($new_path_findings);
                }
                $imagePathsFindingString = implode(', ', $imageFindingPaths);

                $dataInspection = [
                    'inspection_status' => 'sudah_inspeksi',
                    'inspector' => 'user login',
                    'condition' => $request->condition,
                    'physic_condition_mobile_tower' => $physic_condition_mobile_tower,
                    'physic_condition_mobile_tower_text' => $physic_condition_mobile_tower_text,
                    'battery_circuit' => $battery_circuit,
                    'battery_circuit_text' => $battery_circuit_text,
                    'solar_panel' => $solar_panel,
                    'solar_panel_text' => $solar_panel_text,
                    'device_circuit_output' => $device_circuit,
                    'device_circuit_output_text' => $device_circuit_text,
                    'findings' => $findingArrayString,
                    'findings_status' => $request->findings_status,
                    'findings_image' => $imagePathsFindingString,
                    'remarks' => $request->remarks,
                    'due_date' => $request->due_date,
                    'crew' => $crew,
                    'list_of_needs' => $request->list_of_needs,
                    'pica_number' => $uniqueString,
                    'created_date' => Carbon::now()->format('Y-m-d'),
                ];
            }
            // return response()->json($dataInspection);
            $data['udpateInspeksi'] = InspeksiMobileTower::firstWhere('id', $request->id)->update($dataInspection);
        } else {
            if (!empty($request->file('action_image'))) {
                //temuan action string array
                $findingActionArray = [];
                foreach ($request->findings_action as $action) {
                    $findingActionArray[] = $action;
                }
                $findingActionArrayString = implode(', ', $findingActionArray);

                //upload image
                $imageActionPaths = [];
                foreach ($request->file('action_image') as $action_image) {
                    $path_action_image = $action_image->store('images', 'public');
                    $new_path_action = 'storage/' . $path_action_image;
                    $imageActionPaths[] = $new_path_action;
                }
                $imagePathsActionString = implode(', ', $imageActionPaths);

                $dataInspection = [
                    'inspection_status' => 'sudah_inspeksi',
                    'inspector' => 'user login',
                    'condition' => $request->condition,
                    'physic_condition_mobile_tower' => $physic_condition_mobile_tower,
                    'physic_condition_mobile_tower_text' => $physic_condition_mobile_tower_text,
                    'battery_circuit' => $battery_circuit,
                    'battery_circuit_text' => $battery_circuit_text,
                    'solar_panel' => $solar_panel,
                    'solar_panel_text' => $solar_panel_text,
                    'device_circuit_output' => $device_circuit,
                    'device_circuit_output_text' => $device_circuit_text,
                    'findings_action' => $findingActionArrayString,
                    'findings_status' => $request->findings_status,
                    'action_image' => $imagePathsActionString,
                    'remarks' => $request->remarks,
                    'due_date' => $request->due_date,
                    'crew' => $crew,
                    'list_of_needs' => $request->list_of_needs,
                    'pica_number' => $uniqueString,
                    'created_date' => Carbon::now()->format('Y-m-d'),
                ];
            // return response()->json($dataInspection);
            $data['udpateInspeksi'] = InspeksiMobileTower::firstWhere('id', $request->id)->update($dataInspection);
            } else {
                $dataInspection = [
                    'inspection_status' => 'sudah_inspeksi',
                    'inspector' => 'user login',
                    'condition' => $request->condition,
                    'physic_condition_mobile_tower' => $physic_condition_mobile_tower,
                    'physic_condition_mobile_tower_text' => $physic_condition_mobile_tower_text,
                    'battery_circuit' => $battery_circuit,
                    'battery_circuit_text' => $battery_circuit_text,
                    'solar_panel' => $solar_panel,
                    'solar_panel_text' => $solar_panel_text,
                    'device_circuit_output' => $device_circuit,
                    'device_circuit_output_text' => $device_circuit_text,
                    'remarks' => $request->remarks,
                    'list_of_needs' => $request->list_of_needs,
                    'pica_number' => $uniqueString,
                    'created_date' => Carbon::now()->format('Y-m-d'),
                ];
            }
            // return response()->json($dataInspection);
            $data['udpateInspeksi'] = InspeksiMobileTower::firstWhere('id', $request->id)->update($dataInspection);
        }

        if (!empty($request->inventory_status)) {
            $getDataInspeksi = InspeksiMobileTower::where('id', $request->id)->first();
            $getDataInventory = InvMobileTower::where('id', $getDataInspeksi->inv_mt_id)->first();
            $dataInventory = [
                'status' => $request->inventory_status,
            ];
            $data['udpateInspeksi'] = InvMobileTower::firstWhere('id', $getDataInventory->id)->update($dataInventory);
        }
        return response()->json($data, 201);
    }

    public function approval(Request $request)
    {
        $dataCheckStatusInspeksi = InspeksiMobileTower::where('id', $request->id)->value('inspection_status');
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
            $data['udpateInspeksiApproval'] = InspeksiMobileTower::where('id', $request->id)->update($dataApproval);
            return response()->json($data);
        } else {
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
        $data['udpateInspeksiApprovalAll'] = InspeksiMobileTower::where('year', $yearNow)->where('inspection_status', 'sudah_inspeksi')->update($dataApproval);
        return response()->json(['message' => 'Approve all updated successfully']);
    }

    public function showData()
    {
        // $findingArray = [];
        // foreach ($request->findings as $finds) {
        //     $findingArray[] = $finds;
        // }
        // $findingArrayString = implode(', ', $findingArray);

        // //explode get temuan
        // $explodeArrayFinding = explode(', ', $findingArrayString);
        // $i=0;
        // foreach ($explodeArrayFinding as $key => $explodeDataFinding) {
        //     $data['temuan'.$i] = $explodeArrayFinding[$i];
        //     $i++;
        // }
        // return response()->json($data);

    }

    public function show($id)
    {
        $inspeksiMobileTower = InspeksiMobileTower::find($id);
        if (is_null($inspeksiMobileTower)) {
            return response()->json(['message' => 'Data not found'], 404);
        }
        return response()->json($inspeksiMobileTower);
    }

    public function destroy($id)
    {
        $inspeksiMobileTower = InspeksiMobileTower::find($id);
        if (is_null($inspeksiMobileTower)) {
            return response()->json(['message' => 'Data not found'], 404);
        }
        $inspeksiMobileTower->delete();
        return response()->json(['message' => 'Data has deleted'], 204);
    }
}
