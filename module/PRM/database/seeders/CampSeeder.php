<?php

namespace Module\PRM\database\seeders;

use Illuminate\Database\Seeder;
use Module\PRM\Models\Camp;

class CampSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call("OthersTableSeeder");

        $camps = array(
            array('id' => '2','name' => 'Gobagona Camp','capacity' => NULL,'status' => '1','created_at' => '2023-02-23 11:14:00','updated_at' => '2023-02-23 11:14:00'),
            array('id' => '3','name' => 'Boradom Camp','capacity' => NULL,'status' => '1','created_at' => '2023-02-23 11:14:15','updated_at' => '2023-02-23 11:14:15'),
            array('id' => '4','name' => 'Hajachora Ansur Camp','capacity' => NULL,'status' => '1','created_at' => '2023-02-23 11:14:38','updated_at' => '2023-02-23 11:14:38'),
            array('id' => '5','name' => 'Dumdumia Camp','capacity' => NULL,'status' => '1','created_at' => '2023-02-23 11:14:52','updated_at' => '2023-02-23 11:14:52'),
            array('id' => '6','name' => 'Other Duty','capacity' => NULL,'status' => '1','created_at' => '2023-02-23 11:15:02','updated_at' => '2023-02-23 11:15:02')
        );

        foreach ($camps as $item) {
            Camp::firstOrCreate(
                [ 'id'             => $item['id'] ],
                [
                    'name'         => $item['name'],
                    'capacity'     => $item['capacity'],
                    'status'       => $item['status'],
                    'created_at'   => $item['created_at'],
                    'updated_at'   => $item['updated_at'],
                ]
            );
        }
    }
}
