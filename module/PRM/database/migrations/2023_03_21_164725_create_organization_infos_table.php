<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizationInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('organization_infos')){
            Schema::create('organization_infos', function (Blueprint $table) {
                $table->id();
                $table -> string('name')->nullable();
                $table -> string('phone_one')->nullable();
                $table -> string('phone_two')->nullable();
                $table -> string('primary_email')->nullable();
                $table -> string('secondary_email')->nullable();
                $table -> string('address')->nullable();
                $table -> string('organization_logo')->nullable();
                $table -> string('website_url')->nullable();
                $table->longText('description')->nullable();
                $table -> string('google_map')->nullable();
                $table->timestamps();

                $table->foreignId('created_by')->constrained('users','id');
                $table->foreignId('updated_by')->constrained('users','id');
            });
        }

    }



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('organization_infos');
    }
}
