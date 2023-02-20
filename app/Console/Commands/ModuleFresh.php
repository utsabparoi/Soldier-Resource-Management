<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Module\UserAccess\Models\Module;
use Symfony\Component\Console\Helper\Table;

class ModuleFresh extends Command
{
    use ProgressTrait;


    protected $signature = 'module:fresh {directory_name=manual}';


    public function handle()
    {

        $this->showProgress();

        $directory_name = $this->argument('directory_name');

        if($directory_name == 'manual') {

            $activeModules = Module::active()->get();


            $module_data = $this->getModuleTableData($activeModules);


            $this->displayModules($module_data);


            $module_id = $this->ask("Module Id: ");

            $module = $activeModules->where('id', $module_id)->first();

        } else {

            $module = Module::where('directory_name', $directory_name)->first();
        }

        if(!$module) {
            $this->line('<fg=red>Invalid Module Id');

            return;
        }



        $this->showProgress();
        Artisan::call('module-table:drop ' . $module->directory_name);


        $this->showProgress();
        Artisan::call('migrate');


        $this->showProgress();
        Artisan::call('module-data:seed ' . $module->directory_name . ' auto');


        $this->info("$module->name Data freshing successfully!");
    }






    public function getModuleTableData($activeModules)
    {
        try {

            $module_data = [];

            foreach ($activeModules as $module) {

                $module_data[] = [$module->id, $module->name];
            }

        } catch (\Throwable $th) {
            //throw $th;
        }


        return $module_data;
    }







    public function displayModules($data)
    {
        $table = new Table($this->output);

        $table->setHeaders([ 'Id', 'Module Name']);

        $table->setRows($data)->render();

        Artisan::call('progress:show');
    }
}
