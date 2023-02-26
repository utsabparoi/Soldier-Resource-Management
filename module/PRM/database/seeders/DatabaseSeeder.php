<?php

namespace Module\PRM\database\seeders;

use Illuminate\Database\Seeder;
use Module\PRM\database\seeders\CampSeeder;
use Module\PRM\database\seeders\CourseSeeder;

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
        ]
    );
    }
}