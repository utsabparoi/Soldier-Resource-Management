<?php

namespace Module\PRM\database\seeders;

use Illuminate\Database\Seeder;
use Module\PRM\Models\TrainingCategory;

class TrainingCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $training_categories = array(
            array('id' => '1','name' => 'UNIT  LEVEL TRAINING','status' => '1','created_at' => '2023-03-27 15:08:56','updated_at' => '2023-03-27 15:08:56'),
            array('id' => '2','name' => 'FORMATION LEVEL TRAINING','status' => '1','created_at' => '2023-03-27 15:09:11','updated_at' => '2023-03-27 15:09:11')
          );

        foreach ($training_categories as $category){
            TrainingCategory::firstOrCreate(
                [
                    'id'                            => $category['id']
                ],
                [
                    'name'                          => $category['name'],
                    'status'                        => $category['status'],
                ]
            );
        }
    }
}
