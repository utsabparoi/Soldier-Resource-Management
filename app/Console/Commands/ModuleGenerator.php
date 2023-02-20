<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;
use Symfony\Component\Console\Input\InputArgument;

class ModuleGenerator extends Command
{



    protected $signature = 'make:module {name}';



    protected $description = 'Module Creating Command';





    public function handle()
    {

        $name = $this->argument('name');

        if (!is_dir('module')) {
            mkdir('module', 0755, true);
        }

        $module = "module/$name";

        if (!is_dir($module)) {

            mkdir($module, 0755, true);
        }

        if (!is_dir("$module/Controllers")) {

            mkdir("$module/Controllers", 0755, true);
        }

        if (!is_dir("$module/database")) {

            mkdir("$module/database", 0755, true);
        }

        if (!is_dir("$module/Models")) {

            mkdir("$module/Models", 0755, true);
        }

        if (!is_dir("$module/Providers")) {

            mkdir("$module/Providers", 0755, true);
        }

        if (!is_dir("$module/Requests")) {

            mkdir("$module/Requests", 0755, true);
        }

        if (!is_dir("$module/routes")) {

            mkdir("$module/routes", 0755, true);
        }

        if (!is_dir("$module/Services")) {

            mkdir("$module/Services", 0755, true);
        }

        $sidebar_name = Str::snake($module);

        if (!is_dir("$module/views/partials/sidebars")) {

            mkdir("$module/views/partials/sidebars", 0755, true);
        }



        $this->info("Module $name Created");
    }
}
