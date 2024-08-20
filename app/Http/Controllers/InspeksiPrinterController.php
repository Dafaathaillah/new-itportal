<?php

namespace App\Http\Controllers;

use App\Models\InspeksiPrinter;
use App\Models\InvPrinter;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InspeksiPrinterController extends Controller
{
    public function cek_data()
    {
        // Mendapatkan tanggal awal dan akhir kuartal saat ini
        $data['now'] = Carbon::now();
        $data['quarterStart'] = $data['now']->copy()->firstOfQuarter()->format('Y-m-d');
        $data['quarterEnd'] = $data['now']->copy()->lastOfQuarter()->format(('Y-m-d'));

        // Mengambil data yang berada dalam rentang kuartal saat ini
        $data['inventories'] = InspeksiPrinter::whereBetween('created_date', [$data['quarterStart'], $data['quarterEnd']])->get();

        return response()->json($data);
    }
    public function index()
    {
        $inspeksi_printer = InspeksiPrinter::all();
        return response()->json($inspeksi_printer);
    }

    public function store(Request $request)
    {
        // start generate code
        $currentDate = Carbon::now();
        $year = $currentDate->format('Y');
        $month = $currentDate->month;
        $day = $currentDate->day;

        $maxId = DB::table('inspeksi_printers')->where('pica_number', '!=', null)->count();

        if (is_null($maxId)) {
            $maxId = 0;
        }

        $uniqueString = 'PICA/PRT/' . $year . '/' . str_pad(($maxId % 10000) + 1, 2, '0', STR_PAD_LEFT);
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
                    'tinta_cyan' => $request->tinta_cyan,
                    'tinta_magenta' => $request->tinta_magenta,
                    'tinta_yellow' => $request->tinta_yellow,
                    'tinta_black' => $request->tinta_black,
                    'body_condition' => $request->body_condition,
                    'usb_cable_condition' => $request->usb_cable_condition,
                    'power_cable_condition' => $request->power_cable_condition,
                    'performing_physical_power_cleaning' => $request->performing_physical_power_cleaning,
                    'performing_cleaning_on_the_printer_waste_box' => $request->performing_cleaning_on_the_printer_waste_box,
                    'performing_cleaning_head' => $request->performing_cleaning_head,
                    'performing_print_quality_test' => $request->performing_print_quality_test,
                    'do_replacing_cable' => $request->do_replacing_cable,
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
                $data['udpateInspeksi'] = InspeksiPrinter::firstWhere('id', $request->id)->update($dataInspection);
            } else {
                //upload image
                $findings_image = $request->file('findings_image');
                $path_findings_image = $findings_image->store('images', 'public');
                $new_path_findings = 'storage/' . $path_findings_image;

                $dataInspection = [
                    'inspection_status' => 'sudah_inspeksi',
                    'inspector' => 'user login',
                    'condition' => $request->condition,
                    'tinta_cyan' => $request->tinta_cyan,
                    'tinta_magenta' => $request->tinta_magenta,
                    'tinta_yellow' => $request->tinta_yellow,
                    'tinta_black' => $request->tinta_black,
                    'body_condition' => $request->body_condition,
                    'usb_cable_condition' => $request->usb_cable_condition,
                    'power_cable_condition' => $request->power_cable_condition,
                    'performing_physical_power_cleaning' => $request->performing_physical_power_cleaning,
                    'performing_cleaning_on_the_printer_waste_box' => $request->performing_cleaning_on_the_printer_waste_box,
                    'performing_cleaning_head' => $request->performing_cleaning_head,
                    'performing_print_quality_test' => $request->performing_print_quality_test,
                    'do_replacing_cable' => $request->do_replacing_cable,
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
            $data['udpateInspeksi'] = InspeksiPrinter::firstWhere('id', $request->id)->update($dataInspection);
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
                    'tinta_cyan' => $request->tinta_cyan,
                    'tinta_magenta' => $request->tinta_magenta,
                    'tinta_yellow' => $request->tinta_yellow,
                    'tinta_black' => $request->tinta_black,
                    'body_condition' => $request->body_condition,
                    'usb_cable_condition' => $request->usb_cable_condition,
                    'power_cable_condition' => $request->power_cable_condition,
                    'performing_physical_power_cleaning' => $request->performing_physical_power_cleaning,
                    'performing_cleaning_on_the_printer_waste_box' => $request->performing_cleaning_on_the_printer_waste_box,
                    'performing_cleaning_head' => $request->performing_cleaning_head,
                    'performing_print_quality_test' => $request->performing_print_quality_test,
                    'do_replacing_cable' => $request->do_replacing_cable,
                    'findings_action' => $request->findings_action,
                    'findings_status' => $request->findings_status,
                    'action_image' => url($new_path_action),
                    'remarks' => $request->remarks,
                    'due_date' => $request->due_date,
                    'inventory_status' => $request->inventory_status,
                    'pica_number' => $uniqueString,
                    'created_date' => Carbon::now()->format('Y-m-d'),
                ];
                $data['udpateInspeksi'] = InspeksiPrinter::firstWhere('id', $request->id)->update($dataInspection);
            } else {

                $dataInspection = [
                    'inspection_status' => 'sudah_inspeksi',
                    'inspector' => 'user login',
                    'condition' => $request->condition,
                    'tinta_cyan' => $request->tinta_cyan,
                    'tinta_magenta' => $request->tinta_magenta,
                    'tinta_yellow' => $request->tinta_yellow,
                    'tinta_black' => $request->tinta_black,
                    'body_condition' => $request->body_condition,
                    'usb_cable_condition' => $request->usb_cable_condition,
                    'power_cable_condition' => $request->power_cable_condition,
                    'performing_physical_power_cleaning' => $request->performing_physical_power_cleaning,
                    'performing_cleaning_on_the_printer_waste_box' => $request->performing_cleaning_on_the_printer_waste_box,
                    'performing_cleaning_head' => $request->performing_cleaning_head,
                    'performing_print_quality_test' => $request->performing_print_quality_test,
                    'do_replacing_cable' => $request->do_replacing_cable,
                    'remarks' => $request->remarks,
                    'inventory_status' => $request->inventory_status,
                    'created_date' => Carbon::now()->format('Y-m-d'),
                ];
            }
            $data['udpateInspeksi'] = InspeksiPrinter::firstWhere('id', $request->id)->update($dataInspection);
        }

        if (!empty($request->inventory_status)) {
            $getDataInspeksi = InspeksiPrinter::where('id', $request->id)->first();
            $getDataInventory = InvPrinter::where('id', $getDataInspeksi->inv_printer_id)->first();
            $dataInventory = [
                'status' => $request->inventory_status,
            ];
            $data['udpateInspeksi'] = InvPrinter::firstWhere('id', $getDataInventory->id)->update($dataInventory);
        }
        return response()->json($dataInspection, 201);
    }

    public function approval(Request $request)
    {
        $dataCheckStatusInspeksi = InspeksiPrinter::where('id', $request->id)->value('inspection_status');
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
            $data['udpateInspeksiApproval'] = InspeksiPrinter::where('id', $request->id)->update($dataApproval);
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
        $data['udpateInspeksiApprovalAll'] = InspeksiPrinter::where('year', $yearNow)->where('inspection_status', 'sudah_inspeksi')->update($dataApproval);
        return response()->json(['message' => 'Approve all updated successfully']);
    }

    public function show($id)
    {
        $inspeksi_printer = InspeksiPrinter::find($id);
        if (is_null($inspeksi_printer)) {
            return response()->json(['message' => 'Panelbox Data not found'], 404);
        }
        return response()->json($inspeksi_printer);
    }

    public function destroy($id)
    {
        $inspeksi_printer = InspeksiPrinter::find($id);
        if (is_null($inspeksi_printer)) {
            return response()->json(['message' => 'Panelbox Data not found'], 404);
        }
        $inspeksi_printer->delete();
        return response()->json(['message' => 'Data has deleted'], 204);
    }
}
