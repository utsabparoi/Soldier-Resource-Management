<?php

namespace Database\Seeders;

use App\Models\CourseModel;
use Illuminate\Database\Seeder;

class CouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employees = array(
            array('id' => '1','name' => 'ARMY COMMANDO COURSE', 'status' => 'true'),
            array('id' => '2','name' => 'BOMB & IED DISPOSAL COURSE', 'status' => 'true'),
            array('id' => '3','name' => 'DRILL INSTRUCTOR COURSE', 'status' => 'true'),
            array('id' => '4','name' => 'SMALL ARMS INSTRUCTOR COURSE', 'status' => 'true'),
            array('id' => '5','name' => 'AMMUNITION MAINTENANCE COURSE', 'status' => 'true'),
            array('id' => '6','name' => 'MORTAR COURSE', 'status' => 'true'),
            array('id' => '7','name' => 'MG COURSE', 'status' => 'true'),
            array('id' => '8','name' => 'OR INTELLIGENCE COURSE', 'status' => 'true'),
            array('id' => '9','name' => 'HARDWARE MAINTENANCE COURSE', 'status' => 'true'),
            array('id' => '10','name' => 'PHYSICAL FITNESS TRAINING COURSE', 'status' => 'true'),
            array('id' => '11','name' => 'BASKETBALL COURSE', 'status' => 'true'),
            array('id' => '12','name' => 'VOLLEYBALL COURSE ', 'status' => 'true'),
            array('id' => '13','name' => 'SWIMMING COURSE', 'status' => 'true'),
            array('id' => '14','name' => 'RUGBY COURSE', 'status' => 'true'),
            array('id' => '15','name' => 'ATHLETICS COURSE', 'status' => 'true'),
            array('id' => '16','name' => 'FOOTBALL COURSE', 'status' => 'true'),
            array('id' => '17','name' => 'HOCKEY COURSE', 'status' => 'true'),
            array('id' => '18','name' => 'BOXING COURSE', 'status' => 'true'),
            array('id' => '19','name' => 'UNARMED COMBAT COURSE', 'status' => 'true'),
            array('id' => '20','name' => 'MAP READING INSTRUCTOR COURSE', 'status' => 'true'),
            array('id' => '21','name' => 'BEUGLE COURSE', 'status' => 'true'),
            array('id' => '22','name' => 'COMPUTER OPERATOR COURSE', 'status' => 'true'),
            array('id' => '23','name' => 'DIVING COURSE', 'status' => 'true'),
            array('id' => '24','name' => 'JCO/ NCO COURSE', 'status' => 'true'),
            array('id' => '25','name' => 'ICT COURSE', 'status' => 'true'),
            array('id' => '26','name' => 'OTHER COURSES', 'status' => 'true'),
        );

        foreach ($employees as $employee){
            CourseModel::firstOrCreate(
                [
                    'id'                            => $employee['id']
                ],
                [
                    'name'                          => $employee['name'],
                    'status'                        => $employee['status'],
                ]
            );
        }
    }
}
