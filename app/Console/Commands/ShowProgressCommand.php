<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Module\UserAccess\Models\Module;
use Symfony\Component\Console\Helper\Table;

class ShowProgressCommand extends Command
{
    protected $signature = 'progress:show';



    public function handle()
    {
        $this->info("Please wait for processing");

        $progressBar = $this->output->createProgressBar(10);

        $progressBar->start();

        sleep(1);

        $progressBar->finish();

        $this->info("");
    }
}
