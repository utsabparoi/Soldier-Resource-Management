<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Module\UserAccess\Models\Module;

class ModuleTableDropCommand extends Command
{
    protected $signature = 'module-table:drop {directory_name}';



    public function handle()
    {
        $directory_name = $this->argument('directory_name');

        $module = Module::where('directory_name', $directory_name)->first();

        $deletable_migrations = [];

        if($module) {

            $this->line("<fg=magenta>$module->name Module Data Dropping...............");


            Artisan::call('progress:show');


            $migrations = array_diff(scandir(base_path("module/$module->directory_name/database/migrations")), array('.', '..'));

            DB::statement('SET FOREIGN_KEY_CHECKS=0');


            $deletable_migrations = [];

            foreach ($migrations as $key => $column) {


                $tables = explode('_create_', $column);

                if(count($tables) > 1) {

                    Schema::dropIfExists(str_replace('_table.php', '', $tables[1]));

                }

                $deletable_migrations[] =  str_replace('.php', '', $column);
            }

            $this->info("$module->name Table Successfully Dropped");


            $this->migrationTableDataDropped($deletable_migrations);

        } else {

            $this->line("<fg=red>Invalid Module");
        }
    }





    private function migrationTableDataDropped($deletable_migrations)
    {

        $this->line("<fg=magenta>Migration Module Data Dropping...............");


        Artisan::call('progress:show');


        DB::table('migrations')->whereIn('migration', $deletable_migrations)->delete();


        DB::statement('SET FOREIGN_KEY_CHECKS=1');


        $this->info("Migration Module Data Successfully Dropped");
    }
}
