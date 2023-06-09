<?php

namespace Database\Seeders;

use App\Models\AdminModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employees = array(
            array('id' => '1', 'name'=>"admin",'email' => 'admin@gmail.com', 'password' => hash::make('12345678')),
        );
        foreach ($employees as $employee){
            AdminModel::firstOrCreate(
                [
                    'id'                            => $employee['id']
                ],
                [
                    'name'                         => $employee['name'],
                    'email'                         => $employee['email'],
                    'password'                      => $employee['password'],
                ]
            );
        }
    }
}
