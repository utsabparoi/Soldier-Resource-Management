<?php

namespace Module\PRM\database\seeders;

use Illuminate\Database\Seeder;
use Module\PRM\database\seeders\CampSeeder;
use Module\PRM\database\seeders\CourseSeeder;
use Module\PRM\database\seeders\ParadeSeeder;
use Module\PRM\database\seeders\ParadeStateSeeder;
use Module\PRM\database\seeders\LeaveCategorySeeder;
use Module\PRM\database\seeders\OrganizationInfoSeeder;
use Module\PRM\database\seeders\VehicleCategoriesSeed;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){
        $this->call(
        [
            CampSeeder::class,
            CourseSeeder::class,
            ParadeSeeder::class,
            LeaveCategorySeeder::class,
            ParadeStateSeeder::class,
            OrganizationInfoSeeder::class,
            VehicleCategoriesSeed::class,
        ]
    );
    }
}
