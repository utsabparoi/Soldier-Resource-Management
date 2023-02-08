<?php

namespace Database\Seeders;

use App\Models\EmployeeModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employees = array(
            array('id' => '1','name' => 'Mr. Abdur Rahim', 'image' => 'backend/images/person.png', 'present_location'=>'100/A Dhaka, Bangladesh', 'join_date_present_unit'=>'11/12/2022', 'enrolment_date'=>'10/01/2021', 'present_rank_date'=>'25/05/2022', 'retirement_date'=>'10/01/2050', 'civ_edn'=>'', 'med_cat'=>'', 'next_rank'=>'Major', 'permanent_address'=>'12/A Dhaka, Bangladesh', 'marital_status'=>'unmarried', 'children_number'=>'', 'status' => 'true'),
            array('id' => '2','name' => 'Mr. Abdul Kalam', 'image' => 'backend/images/person.png', 'present_location'=>'23/B Mymensing, Bangladesh', 'join_date_present_unit'=>'11/12/2022', 'enrolment_date'=>'10/01/2021', 'present_rank_date'=>'25/05/2022', 'retirement_date'=>'10/01/2050', 'civ_edn'=>'', 'med_cat'=>'', 'next_rank'=>'Captain', 'permanent_address'=>'12/A Dhaka, Bangladesh', 'marital_status'=>'unmarried', 'children_number'=>'', 'status' => 'true'),
            array('id' => '3','name' => 'Mr. Abdul Rashid', 'image' => 'backend/images/person.png', 'present_location'=>'22/1 Chattagram, Bangladesh', 'join_date_present_unit'=>'11/12/2022', 'enrolment_date'=>'10/01/2021', 'present_rank_date'=>'25/05/2022', 'retirement_date'=>'10/01/2050', 'civ_edn'=>'', 'med_cat'=>'', 'next_rank'=>'Officer', 'permanent_address'=>'12/A Dhaka, Bangladesh', 'marital_status'=>'unmarried', 'children_number'=>'', 'status' => 'true'),
            array('id' => '4','name' => 'Mr. Tofayel Islam', 'image' => 'backend/images/person.png', 'present_location'=>'70/A/1 Barisal, Bangladesh', 'join_date_present_unit'=>'11/12/2022', 'enrolment_date'=>'10/01/2021', 'present_rank_date'=>'25/05/2022', 'retirement_date'=>'10/01/2050', 'civ_edn'=>'', 'med_cat'=>'', 'next_rank'=>'Officer', 'permanent_address'=>'12/A Dhaka, Bangladesh', 'marital_status'=>'unmarried', 'children_number'=>'', 'status' => 'true'),
            array('id' => '5','name' => 'Mr. Sanaullah Haque', 'image' => 'backend/images/person.png', 'present_location'=>'1670/1 Jessor, Bangladesh', 'join_date_present_unit'=>'11/12/2022', 'enrolment_date'=>'10/01/2021', 'present_rank_date'=>'25/05/2022', 'retirement_date'=>'10/01/2050', 'civ_edn'=>'', 'med_cat'=>'', 'next_rank'=>'Officer', 'permanent_address'=>'12/A Dhaka, Bangladesh', 'marital_status'=>'unmarried', 'children_number'=>'', 'status' => 'true'),
            array('id' => '6','name' => 'Mr. Monir Chowdhury', 'image' => 'backend/images/person.png', 'present_location'=>'44/2 Rajshahi, Bangladesh', 'join_date_present_unit'=>'11/12/2022', 'enrolment_date'=>'10/01/2021', 'present_rank_date'=>'25/05/2022', 'retirement_date'=>'10/01/2050', 'civ_edn'=>'', 'med_cat'=>'', 'next_rank'=>'Major', 'permanent_address'=>'12/A Dhaka, Bangladesh', 'marital_status'=>'unmarried', 'children_number'=>'', 'status' => 'true'),
        );

        foreach ($employees as $employee){
            EmployeeModel::firstOrCreate(
                [
                    'id'                            => $employee['id']
                ],
                [
                    'name'                          => $employee['name'],
                    'image'                         => $employee['image'],
                    'present_location'              => $employee['present_location'],
                    'join_date_present_unit'        => $employee['join_date_present_unit'],
                    'enrolment_date'                => $employee['enrolment_date'],
                    'present_rank_date'             => $employee['present_rank_date'],
                    'retirement_date'               => $employee['retirement_date'],
                    'civ_edn'                       => $employee['civ_edn'],
                    'med_cat'                       => $employee['med_cat'],
                    'next_rank'                     => $employee['next_rank'],
                    'permanent_address'             => $employee['permanent_address'],
                    'marital_status'                => $employee['marital_status'],
                    'children_number'               => $employee['children_number'],
                    'status'                        => $employee['status'],
                ]
            );
        }
    }
}
