<?php

namespace App\Console\Commands;

use App\Models\InspeksiLaptop;
use App\Models\InvLaptop;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ImportInventoryToInspeksiLaptop extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'inspeksiLaptop:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import data from inventory to inspeksi laptop every year';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Retrieve data from inventory
        $inventories_laptop = InvLaptop::get();

        // Insert data into inspeksi
        foreach ($inventories_laptop as $inventory_laptop) {
            InspeksiLaptop::create([
                'inv_laptop_id' => $inventory_laptop->id,
                'year' => Carbon::now()->format('Y'),
            ]);
        }

        $this->info('Data successfully imported from inventory to inspeksi.');
    }
}
