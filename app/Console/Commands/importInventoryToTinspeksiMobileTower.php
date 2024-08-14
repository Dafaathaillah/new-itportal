<?php

namespace App\Console\Commands;

use App\Models\InspeksiMobileTower;
use App\Models\InvMobileTower;
use Carbon\Carbon;
use Illuminate\Console\Command;

class importInventoryToTinspeksiMobileTower extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'inspeksiMobileTower:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Retrieve data from inventory
        $inventoriesMobileTower = InvMobileTower::get();

        // Insert data into inspeksi
        foreach ($inventoriesMobileTower as $inventoryMobileTower) {
            InspeksiMobileTower::create([
                'inv_mt_id' => $inventoryMobileTower->id,
                'month' => Carbon::now()->format('m'),
                'year' => Carbon::now()->format('Y'),
            ]);
        }

        $this->info('Data successfully imported from inventory to inspeksi.');
    }
}
