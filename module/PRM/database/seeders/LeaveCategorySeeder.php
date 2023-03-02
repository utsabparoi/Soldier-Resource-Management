<?php

namespace Module\PRM\database\seeders;

use Illuminate\Database\Seeder;
use Module\PRM\Models\LeaveCategory;

class LeaveCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $leave_categories = array(
            array('id' => '2','name' => 'PRIVILEGE LEAVE','status' => '1','created_at' => '2023-02-26 07:26:24','updated_at' => '2023-02-26 07:26:24'),
            array('id' => '3','name' => 'CASUAL LEAVE','status' => '1','created_at' => '2023-02-26 07:26:37','updated_at' => '2023-02-26 07:26:37'),
            array('id' => '4','name' => 'RECREATION LEAVE','status' => '1','created_at' => '2023-03-01 10:03:21','updated_at' => '2023-03-01 10:03:21'),
            array('id' => '5','name' => 'MATERNITY LEAVE','status' => '1','created_at' => '2023-03-01 10:03:34','updated_at' => '2023-03-01 10:03:34'),
            array('id' => '6','name' => 'MEDICAL LEAVE','status' => '1','created_at' => '2023-03-01 10:06:12','updated_at' => '2023-03-01 10:06:12'),
            array('id' => '7','name' => 'OTHERS','status' => '1','created_at' => '2023-03-01 10:06:21','updated_at' => '2023-03-01 10:06:21')
        );

        foreach($leave_categories as $category){
            LeaveCategory::firstOrCreate(
                [   'id' => $category['id']],
                [
                    'name' => $category['name'],
                    'status' => $category['status'],
                    'created_at' =>$category['created_at'],
                    'updated_at' =>$category['updated_at']
                ]
            );
        }

    }
}
