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
            array('id' => '1','name' => 'Mr. Abdur Rahim', 'present_location'=>'2', 'join_date_present_unit'=>date('Ymd'), 'enrolment_date'=>date('Ymd'), 'present_rank_date'=>date('Ymd'), 'retirement_date'=>date('Ymd'), 'civ_edn'=>'', 'med_cat'=>'', 'next_rank'=>'Major', 'permanent_address'=>'12/A Dhaka, Bangladesh', 'marital_status'=>'unmarried', 'children_number'=>'', 'status' => '1', 'created_by'=>'1', 'updated_by'=>'1'),
            array('id' => '2','name' => 'Mr. Abdul Kalam', 'present_location'=>'2', 'join_date_present_unit'=>date('Ymd'), 'enrolment_date'=>date('Ymd'), 'present_rank_date'=>date('Ymd'), 'retirement_date'=>date('Ymd'), 'civ_edn'=>'', 'med_cat'=>'', 'next_rank'=>'Captain', 'permanent_address'=>'12/A Dhaka, Bangladesh', 'marital_status'=>'unmarried', 'children_number'=>'', 'status' => '1', 'created_by'=>'1', 'updated_by'=>'1'),
            array('id' => '3','name' => 'Mr. Abdul Rashid', 'present_location'=>'3', 'join_date_present_unit'=>date('Ymd'), 'enrolment_date'=>date('Ymd'), 'present_rank_date'=>date('Ymd'), 'retirement_date'=>date('Ymd'), 'civ_edn'=>'', 'med_cat'=>'', 'next_rank'=>'Officer', 'permanent_address'=>'12/A Dhaka, Bangladesh', 'marital_status'=>'unmarried', 'children_number'=>'', 'status' => '1', 'created_by'=>'1', 'updated_by'=>'1'),
            array('id' => '4','name' => 'Mr. Tofayel Islam', 'present_location'=>'3', 'join_date_present_unit'=>date('Ymd'), 'enrolment_date'=>date('Ymd'), 'present_rank_date'=>date('Ymd'), 'retirement_date'=>date('Ymd'), 'civ_edn'=>'', 'med_cat'=>'', 'next_rank'=>'Officer', 'permanent_address'=>'12/A Dhaka, Bangladesh', 'marital_status'=>'unmarried', 'children_number'=>'', 'status' => '1', 'created_by'=>'1', 'updated_by'=>'1'),
            array('id' => '5','name' => 'Mr. Sanaullah Haque', 'present_location'=>'4', 'join_date_present_unit'=>date('Ymd'), 'enrolment_date'=>date('Ymd'), 'present_rank_date'=>date('Ymd'), 'retirement_date'=>date('Ymd'), 'civ_edn'=>'', 'med_cat'=>'', 'next_rank'=>'Officer', 'permanent_address'=>'12/A Dhaka, Bangladesh', 'marital_status'=>'unmarried', 'children_number'=>'', 'status' => '1', 'created_by'=>'1', 'updated_by'=>'1'),
            array('id' => '6','name' => 'Mr. Monir Chowdhury', 'present_location'=>'5', 'join_date_present_unit'=>date('Ymd'), 'enrolment_date'=>date('Ymd'), 'present_rank_date'=>date('Ymd'), 'retirement_date'=>date('Ymd'), 'civ_edn'=>'', 'med_cat'=>'', 'next_rank'=>'Major', 'permanent_address'=>'12/A Dhaka, Bangladesh', 'marital_status'=>'unmarried', 'children_number'=>'', 'status' => '1', 'created_by'=>'1', 'updated_by'=>'1'),
        );

        foreach ($parade as $parades){
            ParadeModel::firstOrCreate(
                [
                    'id'                            => $parades['id']
                ],
                [
                    'name'                          => $parades['name'],
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
                    'created_by'                    => $parades['created_by'],
                    'updated_by'                    => $parades['updated_by'],
                ]
            );
        }
    }
}
