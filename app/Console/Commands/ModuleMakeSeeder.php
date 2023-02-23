<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ModuleMakeSeeder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'module:make-seed {name} {path?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create module database seeder file.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $name = $this->argument('name');
        $path = $this->argument('path');


        if ($path == '') {
            $path = $this->ask('Module Name: ');
        }


        $seeder = file_get_contents(base_path('app/Console/stubs/module/seeder.stub'));

        $seeder = str_replace('ModuleName', $path, $seeder);
        $seeder = str_replace('DummyTableSeeder', $name, $seeder);

        file_put_contents("module/$path/database/seeders/" . $name . '.php', $seeder);

        $this->info('Seeder created successfully.');
    }
}
