<?php

namespace App\Console\Commands;

use App\Models\InspeksiComputer;
use App\Models\InvComputer;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ImportInventoryToInspeksiComputer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'inspeksiComputer:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import data from inventory to inspeksi computers every quarter';


    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Retrieve data from inventory
        $inventories_computer = InvComputer::get();

        // Insert data into inspeksi
        foreach ($inventories_computer as $inventory_computer) {
            InspeksiComputer::create([
                'inv_computer_id' => $inventory_computer->id,
                'month' => Carbon::now()->format('m'),
                'year' => Carbon::now()->format('Y'),
            ]);
        }

        $this->info('Data successfully imported from inventory to inspeksi.');
    }
}
