<?php

namespace Module\PRM\database\seeders;

use Illuminate\Database\Seeder;
use Module\PRM\Models\ParadeStateModel;

class ParadeStateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parade_states = array(
            array('id' => '1','name' => 'AUTHORIZED STATE', 'status' => '1'),
            array('id' => '2','name' => 'HELD STATE', 'status' => '1'),
            array('id' => '3','name' => 'OFF RATION', 'status' => '1'),
            array('id' => '4','name' => 'ON RATION', 'status' => '1'),
        );

        foreach ($parade_states as $state){
            ParadeStateModel::firstOrCreate(
                [
                    'id'                            => $state['id']
                ],
                [
                    'name'                          => $state['name'],
                    'status'                        => $state['status'],
                ]
            );
        }
    }
}
