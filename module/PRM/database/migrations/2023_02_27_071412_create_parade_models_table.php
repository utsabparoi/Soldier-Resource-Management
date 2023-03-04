<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParadeModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('parades')){
            Schema::create('parades', function (Blueprint $table) {
                $table -> id();
                $table -> string('name');
                $table -> string('image')->nullable();
                $table -> string('present_location')->nullable();
                $table -> date('join_date_present_unit')->nullable();
                $table -> date('enrolment_date')->nullable();
                $table -> date('present_rank_date')->nullable();
                $table -> date('retirement_date')->nullable();
                $table -> string('civ_edn')->nullable();
                $table -> string('med_cat')->nullable();
                $table -> string('next_rank')->nullable();
                $table -> string('permanent_address')->nullable();
                $table -> string('marital_status')->nullable();
                $table -> string('children_number')->nullable();
                $table -> string('status');
                $table->foreignId('created_by')->constrained('users', 'id');
                $table->foreignId('updated_by')->constrained('users', 'id');
                $table -> timestamps();
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
        Schema::dropIfExists('parades');
    }
}
