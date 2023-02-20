<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PermissionModuleDataDrop extends Command
{
    protected $signature = 'permission:drop';

    protected $description = 'Drop All Permission Module Tables';

    public function handle()
    {
        $tables = [
            'employee_permissions',
            'permission_features',
            'designation_user',
            'department_user',
            'permission_user',
            'company_user',
            'permissions',
            'parent_permissions',
            'submodules',
            'modules',
        ];

        foreach ($tables as $table) {
            Schema::dropIfExists($table);

            DB::table('migrations')->where('migration', 'like', '%_create_'.$table.'_table')->delete();
        }


        $this->info('Permission Module tables successfully droped!');
    }
}
