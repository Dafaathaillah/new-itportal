<?php

namespace App\Console\Commands;

use App\Models\InspeksiPrinter;
use App\Models\InvPrinter;
use Carbon\Carbon;
use Illuminate\Console\Command;

class importInventoryToInspeksiPrinter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'inspeksiPrinter:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import data from inventory to inspeksi printer every month';

    /**
     * Execute the console command.
     */
    public function handle()
    {
         // Retrieve data from inventory
         $inventories_printer = InvPrinter::get();

         // Insert data into inspeksi
         foreach ($inventories_printer as $inventory_printer) {
             InspeksiPrinter::create([
                 'inv_printer_id' => $inventory_printer->id,
                 'month' => Carbon::now()->format('m'),
                 'year' => Carbon::now()->format('Y'),
             ]);
         }
 
         $this->info('Data successfully imported from inventory to inspeksi.');
    }
}
