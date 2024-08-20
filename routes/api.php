<?php

use App\Http\Controllers\AduanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ComputerLoanController;
use App\Http\Controllers\DailyJobAssignmentController;
use App\Http\Controllers\GaransionLaptopController;
use App\Http\Controllers\InspeksiAccessPointController;
use App\Http\Controllers\InspeksiComputerController;
use App\Http\Controllers\InspeksiLaptopController;
use App\Http\Controllers\InspeksiMobileTowerController;
use App\Http\Controllers\InspeksiPanelBoxNetworkController;
use App\Http\Controllers\InspeksiPrinterController;
use App\Http\Controllers\InspeksiSwitchController;
use App\Http\Controllers\InspeksiTowerController;
use App\Http\Controllers\InspeksiWirellessController;
use App\Http\Controllers\InvApController;
use App\Http\Controllers\InvCctvController;
use App\Http\Controllers\InvChannelRadioController;
use App\Http\Controllers\InvComputerController;
use App\Http\Controllers\InvGpsController;
use App\Http\Controllers\InvLaptopController;
use App\Http\Controllers\InvMobileTowerController;
use App\Http\Controllers\InvNvrController;
use App\Http\Controllers\InvPanelBoxController;
use App\Http\Controllers\InvPrinterController;
use App\Http\Controllers\InvRadioController;
use App\Http\Controllers\InvServerController;
use App\Http\Controllers\InvSwitchController;
use App\Http\Controllers\InvTowerController;
use App\Http\Controllers\InvWirellessController;
use App\Http\Controllers\KomputerController;
use App\Http\Controllers\KpiDeviceController;
use App\Http\Controllers\KpiResponseTimeController;
use App\Http\Controllers\KpiServerController;
use App\Http\Controllers\LaptopLoanController;
use App\Http\Controllers\ServerBreakdownController;
use App\Http\Controllers\UnscheduleJobController;
use App\Http\Controllers\UserAllController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function (Request $request) {
    $inventoriesMobileTower = InvMobileTower::get();
    // Insert data into inspeksi
    foreach ($inventoriesMobileTower as $inventoryMobileTower) {
        return response()->json($inventoryMobileTower->id);
    }
    return response()->json(['success' => 'success import data'], 200);
});

// Route::apiResource('users_all', UserAllController::class);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('users_all', UserAllController::class);

    Route::prefix('inventory')->group(function () {
        Route::apiResource('komputer', KomputerController::class);
        Route::apiResource('computer', InvComputerController::class);
        Route::apiResource('laptop', InvLaptopController::class);
        Route::apiResource('garansion_laptop', GaransionLaptopController::class);
        Route::apiResource('printer', InvPrinterController::class);
        Route::apiResource('access_point', InvApController::class);
        Route::apiResource('switch', InvSwitchController::class);
        Route::apiResource('wirelless', InvWirellessController::class);
        Route::apiResource('nvr', InvNvrController::class);
        Route::apiResource('cctv', InvCctvController::class);
        Route::apiResource('mobile_tower', InvMobileTowerController::class);
        Route::apiResource('tower_blc', InvTowerController::class);
        Route::apiResource('panel_box', InvPanelBoxController::class);
        Route::apiResource('gps', InvGpsController::class);
        Route::apiResource('radio', InvRadioController::class);
        Route::apiResource('channel_radio', InvChannelRadioController::class);
        Route::apiResource('server', InvServerController::class);
        Route::apiResource('panelbox_network', InvPanelBoxController::class);
    });
    
    Route::prefix('peminjaman')->group(function () {
        Route::apiResource('komputer', ComputerLoanController::class);
        Route::apiResource('laptop', LaptopLoanController::class);
        Route::post('store_history_computer_loan', [ComputerLoanController::class, 'store_history_loan'])->name('api.storeLoanComputer');
        Route::post('update_history_computer_loan', [ComputerLoanController::class, 'update_history_loan'])->name('api.updateLoanComputer');
        Route::get('get_data_history_computer_loan', [ComputerLoanController::class, 'get_history_loan'])->name('api.getHistoryData');
        Route::post('store_history_laptop_loan', [LaptopLoanController::class, 'store_history_loan'])->name('api.storeLoanLaptop');
        Route::post('update_history_laptop_loan', [LaptopLoanController::class, 'update_history_loan'])->name('api.updateLoanLaptop');
        Route::get('get_data_history_laptop_loan', [LaptopLoanController::class, 'get_history_loan'])->name('api.getHistoryData');
    });
    
    Route::prefix('itportal')->group(function () {
        Route::apiResource('aduan', AduanController::class);
        Route::post('aduan_update_closing', [AduanController::class, 'update_aduan'])->name('api.updateAduan');
        Route::apiResource('unschedule_job', UnscheduleJobController::class);
        Route::apiResource('job_assignment', DailyJobAssignmentController::class);
        Route::get('get_data_daily_job_assignment', [DailyJobAssignmentController::class, 'showDataGlPage'])->name('getDataGlPage');
        Route::get('get_data_daily_job_assignment_technician', [DailyJobAssignmentController::class, 'showDataTechnicianPage'])->name('getDataTechnicianPage');
        Route::post('sorting_date', [DailyJobAssignmentController::class, 'showDataGlPageSortingDate'])->name('api.sortingDate');
        Route::post('closing_job_technician', [DailyJobAssignmentController::class, 'closingJobAssigmentTechnician'])->name('api.closeJobTechnician');
        Route::post('perangkat_breakdown', [UnscheduleJobController::class, 'store'])->name('api.perangkatBreakdown');
        Route::post('server_breakdown', [ServerBreakdownController::class, 'store'])->name('api.serverBr/eakdown');
        Route::get('get_data_user_login', [UnscheduleJobController::class, 'get_data_user_login'])->name('api.getDataUserLogin');
        Route::post('kpi_perangkat', [KpiDeviceController::class, 'showKpi'])->name('api.showKpiPerangkat');
        Route::post('kpi_server', [KpiServerController::class, 'showKpi'])->name('api.showKpiServer');
        Route::post('kpi_response_time', [KpiResponseTimeController::class, 'showKpi'])->name('api.showKpiResponseTime');
    });

    Route::prefix('itportal/inspeksi')->group(function () {
        Route::get('cek_data_computers', [InspeksiComputerController::class, 'cek_data']);
    
        Route::apiResource('panelbox', InspeksiPanelBoxNetworkController::class);
        Route::post('approval_panelbox', [InspeksiPanelBoxNetworkController::class, 'approval'])->name('api.approvalInspeksiPanelbox');
        Route::post('approval_all_panelbox', [InspeksiPanelBoxNetworkController::class, 'approvalAll'])->name('api.approvalAllInspeksiPanelbox');
    
        Route::apiResource('computers', InspeksiComputerController::class);
        Route::post('approval_computers', [InspeksiComputerController::class, 'approval'])->name('api.approvalInspeksiComputers');
        Route::post('approval_all_computers', [InspeksiComputerController::class, 'approvalAll'])->name('api.approvalAllInspeksiComputers');
    
        Route::apiResource('laptops', InspeksiLaptopController::class);
        Route::post('approval_laptops', [InspeksiLaptopController::class, 'approval'])->name('api.approvalInspeksiLaptops');
        Route::post('approval_all_laptops', [InspeksiLaptopController::class, 'approvalAll'])->name('api.approvalAllInspeksiLaptops');
    
        Route::apiResource('printers', InspeksiPrinterController::class);
        Route::post('approval_printers', [InspeksiPrinterController::class, 'approval'])->name('api.approvalInspeksiPrinters');
        Route::post('approval_all_printers', [InspeksiPrinterController::class, 'approvalAll'])->name('api.approvalAllInspeksiPrinters');
    
        Route::get('ping_access_point', [InspeksiAccessPointController::class, 'ping']);
        Route::post('ping_access_point_single', [InspeksiAccessPointController::class, 'singlePing']);
        Route::post('update_inspeksi_access_point', [InspeksiAccessPointController::class, 'update']);
        Route::post('approval_access_point', [InspeksiAccessPointController::class, 'approval']);
        Route::post('approval_all_access_point', [InspeksiAccessPointController::class, 'approvalAll']);
    
        Route::get('ping_wirelless', [InspeksiWirellessController::class, 'ping']);
        Route::post('ping_wirelless_single', [InspeksiWirellessController::class, 'singlePing']);
        Route::post('update_inspeksi_wirelless', [InspeksiWirellessController::class, 'update']);
        Route::post('approval_wirelless', [InspeksiWirellessController::class, 'approval']);
        Route::post('approval_all_wirelless', [InspeksiWirellessController::class, 'approvalAll']);
    
        Route::get('ping_switch', [InspeksiSwitchController::class, 'ping']);
        Route::post('ping_switch_single', [InspeksiSwitchController::class, 'singlePing']);
        Route::post('update_inspeksi_switch', [InspeksiSwitchController::class, 'update']);
        Route::post('approval_switch', [InspeksiSwitchControllers::class, 'approval']);
        Route::post('approval_all_switch', [InspeksiSwitchControllers::class, 'approvalAll']);
    
        Route::apiResource('mobile_towers', InspeksiMobileTowerController::class);
        Route::post('approval_mobile_towers', [InspeksiSwitchControllers::class, 'approval']);
        Route::post('approval_all_mobile_towers', [InspeksiSwitchControllers::class, 'approvalAll']);
    
        Route::apiResource('towers', InspeksiTowerController::class);
        Route::post('approval_towers', [InspeksiTowerController::class, 'approval']);
        Route::post('approval_all_towers', [InspeksiTowerController::class, 'approvalAll']);
    });
    
    Route::post('/logout', [AuthController::class, 'logout']);
});
