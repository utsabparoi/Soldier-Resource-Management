<?php

namespace Module\PRM\database\seeders;

use Illuminate\Database\Seeder;
use Module\PRM\Models\OrganizationInfo;

class OrganizationInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OrganizationInfo::insertOrIgnore([
            'id' => '1',
            'favicon' => '/frontend/favicon/army-favicon.ico',
            'name' => 'Perfect Ten',
            'title' => 'Perfect Ten',
            'phone_no' => '01712345678',
            'secondary_phone' => '01719876543',
            'primary_email' => 'exampleprimary@gmail.com',
            'secondary_email' => 'examplescondemail@gmail.com',
            'address' => 'addresOfyourorganization',
            'organization_logo' => '/logo.png',
            'website_url' => 'organizationname.com',
            'bin_no' => 'organization bin no',
            'google_map' => 'google_map_link',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'created_by' =>'1',
            'updated_by' =>'1'
        ]);
    }
}
