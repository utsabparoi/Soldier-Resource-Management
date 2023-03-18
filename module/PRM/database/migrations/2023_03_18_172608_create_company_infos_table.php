<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('company_infos')){
            Schema::create('company_infos', function (Blueprint $table) {
                $table->id();
                $table -> string('favicon');
                $table -> string('name')->nullable();
                $table -> string('title')->nullable();
                $table -> string('phone_one')->nullable();
                $table -> string('primary_email')->nullable();
                $table -> string('address')->nullable();
                $table -> string('company_logo')->nullable();
                $table -> string('website')->nullable();
                $table -> string('bin_no')->nullable();
                $table -> string('google_map')->nullable();
                $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('company_infos');
    }
}
