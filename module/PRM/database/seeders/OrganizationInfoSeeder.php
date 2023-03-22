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
            'name' => 'Perfect Ten',
            'phone_one' => '01712345678',
            'phone_two' => '01719876543',
            'primary_email' => 'exampleprimary@gmail.com',
            'secondary_email' => 'examplescondemail@gmail.com',
            'address' => 'addresOfyourorganization',
            'organization_logo' => '/logo.png',
            'website_url' => 'organizationname.com',
            'description' =>'organization_description',
            'google_map' => 'google_map_embeded_link',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'created_by' =>'1',
            'updated_by' =>'1'
        ]);
    }
}
