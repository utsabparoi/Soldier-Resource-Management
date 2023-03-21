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
                $table -> string('favicon');
                $table -> string('name')->nullable();
                $table -> string('title')->nullable();
                $table -> string('phone_no')->nullable();
                $table -> string('secondary_phone')->nullable();
                $table -> string('primary_email')->nullable();
                $table -> string('secondary_email')->nullable();
                $table -> string('address')->nullable();
                $table -> string('organization_logo')->nullable();
                $table -> string('website_url')->nullable();
                $table -> string('bin_no')->nullable();
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
