<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParadeCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('parade_courses')){
            Schema::create('parade_courses', function (Blueprint $table) {
                $table->id();
                $table->foreignId('course_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
                $table->foreignId('parade_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
                $table->string('serial_no')->nullable();
                $table->string('duration')->nullable();
                $table->string('result')->nullable();
                $table->string('remark')->nullable();
                $table->tinyInteger('status')->default(1);
                $table->timestamps();
                
                $table->foreignId('created_by')->constrained('users', 'id');
                $table->foreignId('updated_by')->constrained('users', 'id');
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
        Schema::dropIfExists('parade_courses');
    }
}
