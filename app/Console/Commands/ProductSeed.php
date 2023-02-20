<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class ProductSeed extends Command
{
    protected $signature = 'product:seed';

    protected $description = 'Seeds Product Related Tables';

    public function handle()
    {
        Artisan::call('db:seed', [
            '--class' => 'Module\Product\database\seeds\DatabaseSeeder',
        ]);

        $this->info('Product tables seeded successfully!');
    }
}
