<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmployeeWithCourse extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("employee_course_result", function (Blueprint $table){
            $table-> id();
            $table -> string('employee_id');
            $table -> string('course_id');
            $table -> string('result')->nullable();
            $table -> string('remarks')->nullable();
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
        Schema::dropIfExists('employee_with_course');
    }
}
