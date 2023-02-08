<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmployeeMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("employee", function (Blueprint $table){
            $table-> id();
            $table -> string('name');
            $table -> string('image')->nullable();
            $table -> string('present_location')->nullable();
            $table -> string('join_date_present_unit')->nullable();
            $table -> string('enrolment_date')->nullable();
            $table -> string('present_rank_date')->nullable();
            $table -> string('retirement_date')->nullable();
            $table -> string('civ_edn')->nullable();
            $table -> string('med_cat')->nullable();
            $table -> string('next_rank')->nullable();
            $table -> string('permanent_address')->nullable();
            $table -> string('marital_status')->nullable();
            $table -> string('children_number')->nullable();
            $table -> string('status');
            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee');
    }
}
