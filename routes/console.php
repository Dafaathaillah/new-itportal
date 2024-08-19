<?php

// use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Schedule;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();


Schedule::command('inspeksiTower:cron')->everyMinute(); // * * * * * php /path/to/your/project/artisan schedule:run >> /dev/null 2>&1 //

Schedule::command('inspeksiMobileTower:cron')->monthly(); // * * * * * php /path/to/your/project/artisan schedule:run >> /dev/null 2>&1 //
Schedule::command('inspeksiTower:cron')->monthly(); // * * * * * php /path/to/your/project/artisan schedule:run >> /dev/null 2>&1 //
Schedule::command('inspeksiComputer:cron')->quarterly(); //  * * * * * php /path-to-your-project/artisan schedule:run >> /dev/null 2>&1 //
Schedule::command('inspeksiLaptop:cron')->yearly(); // * * * * * php /path/to/your/project/artisan schedule:run >> /dev/null 2>&1 //
Schedule::command('inspeksiPrinter:cron')->monthly(); // * * * * * php /path/to/your/project/artisan schedule:run >> /dev/null 2>&1 //
Schedule::command('inspeksiAp:cron')->monthly(); // * * * * * php /path/to/your/project/artisan schedule:run >> /dev/null 2>&1 //
Schedule::command('inspeksiWirelless:cron')->monthly(); // * * * * * php /path/to/your/project/artisan schedule:run >> /dev/null 2>&1 //
Schedule::command('inspeksiSwitch:cron')->monthly(); // * * * * * php /path/to/your/project/artisan schedule:run >> /dev/null 2>&1 //