<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class ModuleTableMigrationCommand extends Command
{
    protected $signature = 'module-table:migrate';



    public function handle()
    {

        $this->line("<fg=magenta>Migration Starting...............");


        Artisan::call('progress:show');


        Artisan::call('migrate');

        $this->info("Migration Completed");
    }
}
