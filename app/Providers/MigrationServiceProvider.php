<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Module\Permission\Models\Module;

class MigrationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        /*
         |--------------------------------------------------------------------------
         | WEBSITE CMS (existing one, got from another project)
         |--------------------------------------------------------------------------
        */
        // $this->loadMigrationsFrom([
        //     base_path().DIRECTORY_SEPARATOR.'module'.DIRECTORY_SEPARATOR.'WebsiteCMS'.DIRECTORY_SEPARATOR.'database'.DIRECTORY_SEPARATOR.'migrations',
        // ]);

        /*
         |--------------------------------------------------------------------------
         | Soldier/Person Resource Management(PRM)
         |--------------------------------------------------------------------------
        */
        $this->loadMigrationsFrom([
            base_path().DIRECTORY_SEPARATOR.'module'.DIRECTORY_SEPARATOR.'PRM'.DIRECTORY_SEPARATOR.'database'.DIRECTORY_SEPARATOR.'migrations',
        ]);
    }
}
