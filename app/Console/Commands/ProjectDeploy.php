<?php

namespace App\Console\Commands;

use App\Providers\MigrationServiceProvider;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Module\Permission\Models\Module;

class ProjectDeploy extends Command
{
    use ProgressTrait;

    protected $signature = 'project:deploy';



    public function handle()
    {
        $this->warn('Start Deploying...');


        Artisan::call("migrate:fresh");


        $this->info('Global Data Preparing...');

        $start_time = now();

        Artisan::call("db:seed");

        $seed_path = 'Module\Permission\database\seeds\DatabaseSeeder';

        Artisan::call('db:seed', [
            '--class' => $seed_path
        ]);



        $time = Carbon::parse(now())->diffInSeconds($start_time);

        $this->warn('Global Data Ready! ' . $time . ' seconds');



        $activeModules = Module::active()->get();



        foreach ($activeModules as $module) {

            if($module->name != 'User Access') {

              try {

                $start_time = now();

                $this->info("$module->directory_name Module Preparing...");




                $this->showProgress();
                Artisan::call('module-table:drop ' . $module->directory_name);



                $this->showProgress();
                Artisan::call("migrate --path=/module/$module->directory_name/database/migrations");


                $this->showProgress();
                Artisan::call('module-data:seed ' . $module->directory_name . ' auto');

                $this->info("$module->name Data freshing successfully!");




                $time = Carbon::parse(now())->diffInSeconds($start_time);

                $this->warn("$module->directory_name Module Ready! " . $time . ' seconds');

                } catch (\Throwable $th) {

                    $this->error($module->name . ' Data Seeding Failed! ' . $th->getMessage());
                }
                
            }

        }

        $this->info('Project Successfully Deployed!');

    }
}
