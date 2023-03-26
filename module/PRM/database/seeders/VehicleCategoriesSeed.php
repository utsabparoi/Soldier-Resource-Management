<?php

namespace Module\PRM\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Module\PRM\Models\VehicleCategoryModel;

class VehicleCategoriesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parade = array(
            array('id' => '1','name' => 'Motor Transport(MT)', 'status' => '1', 'created_by'=>'1', 'updated_by'=>'1'),
            array('id' => '2','name' => 'Vessel', 'status' => '1', 'created_by'=>'1', 'updated_by'=>'1'),
        );

        foreach ($parade as $parades){
            VehicleCategoryModel::firstOrCreate(
                [
                    'id'                            => $parades['id']
                ],
                [
                    'name'                          => $parades['name'],
                    'status'                        => $parades['status'],
                    'created_by'                    => $parades['created_by'],
                    'updated_by'                    => $parades['updated_by'],
                ]
            );
        }
    }
}
