<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Module\UserAccess\Models\Module;
use Symfony\Component\Console\Helper\Table;

class ModuleDataSeedCommand extends Command
{
    protected $signature = 'module-data:seed {directory_name} {type=manual}';



    public function handle()
    {
        $directory_name     = $this->argument('directory_name');
        $type               = $this->argument('type');


        $module = Module::where('directory_name', $directory_name)->first();


        if($module) {

            $seeder_directories = array_diff(scandir(base_path("module/$module->directory_name/database/seeds")), array('.', '..'));

            $seeders = [];
            $data = [];
            $table = new Table($this->output);

            $table->setHeaders(['Index', 'Seeder']);

            $index = 0;

            $data[] = [$index++, "All"];

            $seeders[] = [];

            foreach ($seeder_directories as $key => $column) {

                $data[] = [$index++, $column];

                $seeders[] =  $column;
            }


            if($type != 'auto') {

                $table->setRows($data)->render();

                $seederIndex = $this->ask("Seeder Index: ");

            } else {

                $seederIndex = 0;
            }


            if($seederIndex == 0) {

                foreach ($seeders as $key => $directoryName) {

                    if($key > 0) {

                        $seederDirectory = "Module\\" . $module->directory_name .  "\database\seeds\\" . $directoryName .  "\DatabaseSeeder";

                        $this->seedData($seederDirectory, $directoryName);
                    }
                }

            } else {

                $seederDirectory = "Module\\" . $module->directory_name .  "\database\seeds\\" . $seeders[$seederIndex] .  "\DatabaseSeeder";

                $this->seedData($seederDirectory, $seeders[$seederIndex]);
            }

        } else {

            $this->line("<fg=red>Invalid Module");
        }
    }





    private function seedData($seederDirectory, $seederName)
    {

        $this->line("<fg=magenta>$seederName Data Seeding Start...............");

        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        Artisan::call('db:seed', [
            '--class' => $seederDirectory
        ]);

        $this->info("$seederName Data Seeding Completed");
    }
}
