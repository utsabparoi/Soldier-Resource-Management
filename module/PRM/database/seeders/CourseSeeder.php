<?php

namespace Module\PRM\database\seeders;

use Module\PRM\Models\Course;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courses = array(
            array('id' => '1','name' => 'ARMY COMMANDO COURSE', 'status' => 1, 'created_at' => '2023-02-25 15:37:00','updated_at' => '2023-02-23 15:37:00','created_by' =>'1','updated_by' =>'1'),
            array('id' => '2','name' => 'BOMB & IED DISPOSAL COURSE', 'status' => 1, 'created_at' => '2023-02-25 15:37:00','updated_at' => '2023-02-23 15:37:00','created_by' =>'1','updated_by' =>'1'),
            array('id' => '3','name' => 'DRILL INSTRUCTOR COURSE', 'status' => 1, 'created_at' => '2023-02-25 15:37:00','updated_at' => '2023-02-23 15:37:00','created_by' =>'1','updated_by' =>'1'),
            array('id' => '4','name' => 'SMALL ARMS INSTRUCTOR COURSE', 'status' => 1, 'created_at' => '2023-02-25 15:37:00','updated_at' => '2023-02-23 15:37:00','created_by' =>'1','updated_by' =>'1'),
            array('id' => '5','name' => 'AMMUNITION MAINTENANCE COURSE', 'status' => 1, 'created_at' => '2023-02-25 15:37:00','updated_at' => '2023-02-23 15:37:00','created_by' =>'1','updated_by' =>'1'),
            array('id' => '6','name' => 'MORTAR COURSE', 'status' => 1, 'created_at' => '2023-02-25 15:37:00','updated_at' => '2023-02-23 15:37:00','created_by' =>'1','updated_by' =>'1'),
            array('id' => '7','name' => 'MG COURSE', 'status' => 1, 'created_at' => '2023-02-25 15:37:00','updated_at' => '2023-02-23 15:37:00','created_by' =>'1','updated_by' =>'1'),
            array('id' => '8','name' => 'OR INTELLIGENCE COURSE', 'status' => 1, 'created_at' => '2023-02-25 15:37:00','updated_at' => '2023-02-23 15:37:00','created_by' =>'1','updated_by' =>'1'),
            array('id' => '9','name' => 'HARDWARE MAINTENANCE COURSE', 'status' => 1, 'created_at' => '2023-02-25 15:37:00','updated_at' => '2023-02-23 15:37:00','created_by' =>'1','updated_by' =>'1'),
            array('id' => '10','name' => 'PHYSICAL FITNESS TRAINING COURSE', 'status' => 1, 'created_at' => '2023-02-25 15:37:00','updated_at' => '2023-02-23 15:37:00','created_by' =>'1','updated_by' =>'1'),
            array('id' => '11','name' => 'BASKETBALL COURSE', 'status' => 1, 'created_at' => '2023-02-25 15:37:00','updated_at' => '2023-02-23 15:37:00','created_by' =>'1','updated_by' =>'1'),
            array('id' => '12','name' => 'VOLLEYBALL COURSE ', 'status' => 1, 'created_at' => '2023-02-25 15:37:00','updated_at' => '2023-02-23 15:37:00','created_by' =>'1','updated_by' =>'1'),
            array('id' => '13','name' => 'SWIMMING COURSE', 'status' => 1, 'created_at' => '2023-02-25 15:37:00','updated_at' => '2023-02-23 15:37:00','created_by' =>'1','updated_by' =>'1'),
            array('id' => '14','name' => 'RUGBY COURSE', 'status' => 1, 'created_at' => '2023-02-25 15:37:00','updated_at' => '2023-02-23 15:37:00','created_by' =>'1','updated_by' =>'1'),
            array('id' => '15','name' => 'ATHLETICS COURSE', 'status' => 1, 'created_at' => '2023-02-25 15:37:00','updated_at' => '2023-02-23 15:37:00','created_by' =>'1','updated_by' =>'1'),
            array('id' => '16','name' => 'FOOTBALL COURSE', 'status' => 1, 'created_at' => '2023-02-25 15:37:00','updated_at' => '2023-02-23 15:37:00','created_by' =>'1','updated_by' =>'1'),
            array('id' => '17','name' => 'HOCKEY COURSE', 'status' => 1, 'created_at' => '2023-02-25 15:37:00','updated_at' => '2023-02-23 15:37:00','created_by' =>'1','updated_by' =>'1'),
            array('id' => '18','name' => 'BOXING COURSE', 'status' => 1, 'created_at' => '2023-02-25 15:37:00','updated_at' => '2023-02-23 15:37:00','created_by' =>'1','updated_by' =>'1'),
            array('id' => '19','name' => 'UNARMED COMBAT COURSE', 'status' => 1, 'created_at' => '2023-02-25 15:37:00','updated_at' => '2023-02-23 15:37:00','created_by' =>'1','updated_by' =>'1'),
            array('id' => '20','name' => 'MAP READING INSTRUCTOR COURSE', 'status' => 1, 'created_at' => '2023-02-25 15:37:00','updated_at' => '2023-02-23 15:37:00','created_by' =>'1','updated_by' =>'1'),
            array('id' => '21','name' => 'BEUGLE COURSE', 'status' => 1, 'created_at' => '2023-02-25 15:37:00','updated_at' => '2023-02-23 15:37:00','created_by' =>'1','updated_by' =>'1'),
            array('id' => '22','name' => 'COMPUTER OPERATOR COURSE', 'status' => 1, 'created_at' => '2023-02-25 15:37:00','updated_at' => '2023-02-23 15:37:00','created_by' =>'1','updated_by' =>'1'),
            array('id' => '23','name' => 'DIVING COURSE', 'status' => 1, 'created_at' => '2023-02-25 15:37:00','updated_at' => '2023-02-23 15:37:00','created_by' =>'1','updated_by' =>'1'),
            array('id' => '24','name' => 'JCO/ NCO COURSE', 'status' => 1, 'created_at' => '2023-02-25 15:37:00','updated_at' => '2023-02-23 15:37:00','created_by' =>'1','updated_by' =>'1'),
            array('id' => '25','name' => 'ICT COURSE', 'status' => 1, 'created_at' => '2023-02-25 15:37:00','updated_at' => '2023-02-23 15:37:00','created_by' =>'1','updated_by' =>'1'),
            array('id' => '26','name' => 'OTHER COURSES', 'status' => 1, 'created_at' => '2023-02-25 15:37:00','updated_at' => '2023-02-23 15:37:00','created_by' =>'1','updated_by' =>'1'),
        );

        foreach ($courses as $course){
            Course::firstOrCreate(
                [
                    'id'                            => $course['id']
                ],
                [
                    'name'                          => $course['name'],
                    'status'                        => $course['status'],
                    'created_by'                        => $course['created_by'],
                    'updated_by'                        => $course['updated_by'],
                ]
            );
        }
    }
}
