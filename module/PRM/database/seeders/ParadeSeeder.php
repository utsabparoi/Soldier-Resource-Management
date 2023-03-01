<?php

namespace Module\PRM\database\seeders;

use Illuminate\Database\Seeder;
use Module\PRM\Models\ParadeModel;

class ParadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parade = array(
            array('id' => '1','name' => 'Mr. Abdur Rahim', 'image' => 'backend/images/person.png', 'present_location'=>'100/A Dhaka, Bangladesh', 'join_date_present_unit'=>date('Ymd'), 'enrolment_date'=>date('Ymd'), 'present_rank_date'=>date('Ymd'), 'retirement_date'=>date('Ymd'), 'civ_edn'=>'', 'med_cat'=>'', 'next_rank'=>'Major', 'permanent_address'=>'12/A Dhaka, Bangladesh', 'marital_status'=>'unmarried', 'children_number'=>'', 'status' => '1'),
            array('id' => '2','name' => 'Mr. Abdul Kalam', 'image' => 'backend/images/person.png', 'present_location'=>'23/B Mymensing, Bangladesh', 'join_date_present_unit'=>date('Ymd'), 'enrolment_date'=>date('Ymd'), 'present_rank_date'=>date('Ymd'), 'retirement_date'=>date('Ymd'), 'civ_edn'=>'', 'med_cat'=>'', 'next_rank'=>'Captain', 'permanent_address'=>'12/A Dhaka, Bangladesh', 'marital_status'=>'unmarried', 'children_number'=>'', 'status' => '1'),
            array('id' => '3','name' => 'Mr. Abdul Rashid', 'image' => 'backend/images/person.png', 'present_location'=>'22/1 Chattagram, Bangladesh', 'join_date_present_unit'=>date('Ymd'), 'enrolment_date'=>date('Ymd'), 'present_rank_date'=>date('Ymd'), 'retirement_date'=>date('Ymd'), 'civ_edn'=>'', 'med_cat'=>'', 'next_rank'=>'Officer', 'permanent_address'=>'12/A Dhaka, Bangladesh', 'marital_status'=>'unmarried', 'children_number'=>'', 'status' => '1'),
            array('id' => '4','name' => 'Mr. Tofayel Islam', 'image' => 'backend/images/person.png', 'present_location'=>'70/A/1 Barisal, Bangladesh', 'join_date_present_unit'=>date('Ymd'), 'enrolment_date'=>date('Ymd'), 'present_rank_date'=>date('Ymd'), 'retirement_date'=>date('Ymd'), 'civ_edn'=>'', 'med_cat'=>'', 'next_rank'=>'Officer', 'permanent_address'=>'12/A Dhaka, Bangladesh', 'marital_status'=>'unmarried', 'children_number'=>'', 'status' => '1'),
            array('id' => '5','name' => 'Mr. Sanaullah Haque', 'image' => 'backend/images/person.png', 'present_location'=>'1670/1 Jessor, Bangladesh', 'join_date_present_unit'=>date('Ymd'), 'enrolment_date'=>date('Ymd'), 'present_rank_date'=>date('Ymd'), 'retirement_date'=>date('Ymd'), 'civ_edn'=>'', 'med_cat'=>'', 'next_rank'=>'Officer', 'permanent_address'=>'12/A Dhaka, Bangladesh', 'marital_status'=>'unmarried', 'children_number'=>'', 'status' => '1'),
            array('id' => '6','name' => 'Mr. Monir Chowdhury', 'image' => 'backend/images/person.png', 'present_location'=>'44/2 Rajshahi, Bangladesh', 'join_date_present_unit'=>date('Ymd'), 'enrolment_date'=>date('Ymd'), 'present_rank_date'=>date('Ymd'), 'retirement_date'=>date('Ymd'), 'civ_edn'=>'', 'med_cat'=>'', 'next_rank'=>'Major', 'permanent_address'=>'12/A Dhaka, Bangladesh', 'marital_status'=>'unmarried', 'children_number'=>'', 'status' => '1'),
        );

        foreach ($parade as $parades){
            ParadeModel::firstOrCreate(
                [
                    'id'                            => $parades['id']
                ],
                [
                    'name'                          => $parades['name'],
                    'image'                         => $parades['image'],
                    'present_location'              => $parades['present_location'],
                    'join_date_present_unit'        => $parades['join_date_present_unit'],
                    'enrolment_date'                => $parades['enrolment_date'],
                    'present_rank_date'             => $parades['present_rank_date'],
                    'retirement_date'               => $parades['retirement_date'],
                    'civ_edn'                       => $parades['civ_edn'],
                    'med_cat'                       => $parades['med_cat'],
                    'next_rank'                     => $parades['next_rank'],
                    'permanent_address'             => $parades['permanent_address'],
                    'marital_status'                => $parades['marital_status'],
                    'children_number'               => $parades['children_number'],
                    'status'                        => $parades['status'],
                ]
            );
        }
    }
}
