<?php

namespace Module\PRM\database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Module\PRM\Models\ParadeTrainingModel;
use Module\PRM\Models\Training;

class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $trainings = array(
            array('id' => '1','training_category_id' => '1','name' => 'EXPLOSIVE & IED','status' => '1','created_at' => '2023-03-27 15:17:26','updated_at' => '2023-03-27 15:17:26','created_by' => '1','updated_by' => '1'),
            array('id' => '2','training_category_id' => '1','name' => 'MINE WARFARE','status' => '1','created_at' => '2023-03-27 15:17:36','updated_at' => '2023-03-27 15:17:36','created_by' => '1','updated_by' => '1'),
            array('id' => '3','training_category_id' => '1','name' => 'OBSTACLE LAYING','status' => '1','created_at' => '2023-03-27 15:17:47','updated_at' => '2023-03-27 15:17:47','created_by' => '1','updated_by' => '1'),
            array('id' => '4','training_category_id' => '1','name' => 'RIVER  CROSSING','status' => '1','created_at' => '2023-03-27 15:17:56','updated_at' => '2023-03-27 15:17:56','created_by' => '1','updated_by' => '1'),
            array('id' => '5','training_category_id' => '1','name' => 'RE  TACTICS','status' => '1','created_at' => '2023-03-27 15:18:06','updated_at' => '2023-03-27 15:18:06','created_by' => '1','updated_by' => '1'),
            array('id' => '6','training_category_id' => '1','name' => 'JETTY & FERRY GHAT MAINTENANCE','status' => '1','created_at' => '2023-03-27 15:18:15','updated_at' => '2023-03-27 15:18:27','created_by' => '1','updated_by' => '1'),
            array('id' => '7','training_category_id' => '1','name' => 'DISASTER MANAGEMENT','status' => '1','created_at' => '2023-03-27 15:18:38','updated_at' => '2023-03-27 15:18:38','created_by' => '1','updated_by' => '1'),
            array('id' => '8','training_category_id' => '1','name' => 'NAVIGATION','status' => '1','created_at' => '2023-03-27 15:18:47','updated_at' => '2023-03-27 15:18:47','created_by' => '1','updated_by' => '1'),
            array('id' => '9','training_category_id' => '2','name' => 'SUMMER TRAINING EXERCISE','status' => '1','created_at' => '2023-03-27 15:19:00','updated_at' => '2023-03-27 15:19:00','created_by' => '1','updated_by' => '1'),
            array('id' => '10','training_category_id' => '2','name' => 'WINTER TRAINING EXERCISE','status' => '1','created_at' => '2023-03-27 15:19:20','updated_at' => '2023-03-27 15:19:20','created_by' => '1','updated_by' => '1'),
            array('id' => '11','training_category_id' => '2','name' => 'FIELD TRAINING EXERCISE','status' => '1','created_at' => '2023-03-27 15:19:34','updated_at' => '2023-03-27 15:19:34','created_by' => '1','updated_by' => '1'),
            array('id' => '12','training_category_id' => '2','name' => 'MG CADRE','status' => '1','created_at' => '2023-03-27 15:19:52','updated_at' => '2023-03-27 15:19:52','created_by' => '1','updated_by' => '1'),
            array('id' => '13','training_category_id' => '2','name' => 'COMBAT LIFE SAVING CADRE','status' => '1','created_at' => '2023-03-27 15:20:01','updated_at' => '2023-03-27 15:20:01','created_by' => '1','updated_by' => '1'),
            array('id' => '14','training_category_id' => '2','name' => 'RL CADRE','status' => '1','created_at' => '2023-03-27 15:20:10','updated_at' => '2023-03-27 15:20:10','created_by' => '1','updated_by' => '1'),
            array('id' => '15','training_category_id' => '2','name' => 'GF CADRE','status' => '1','created_at' => '2023-03-27 15:20:20','updated_at' => '2023-03-27 15:20:20','created_by' => '1','updated_by' => '1'),
            array('id' => '16','training_category_id' => '2','name' => 'INT CADRE','status' => '1','created_at' => '2023-03-27 15:20:30','updated_at' => '2023-03-27 15:20:30','created_by' => '1','updated_by' => '1')
        );

        foreach ($trainings as $training){
            Training::firstOrCreate(
                [
                    'id'                            => $training['id']
                ],
                [
                    'training_category_id'          => $training['training_category_id'],
                    'name'                          => $training['name'],
                    'status'                        => $training['status'],
                    'created_at'                    => $training['created_at'],
                    'updated_at'                    => $training['updated_at'],
                    'created_by'                    => $training['created_by'],
                    'updated_by'                    => $training['updated_by'],
                ]
            );
        }
    }
}
