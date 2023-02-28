<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParadeTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('parade_trainings')){
            Schema::create('parade_trainings', function (Blueprint $table) {
                $table->id();
                $table->foreignId('training_id')->constrained();
                $table->foreignId('parade_id')->constrained();
                $table->string('serial_no')->nullable();
                $table->string('duration')->nullable();
                $table->foreignId('result')->nullable();
                $table->foreignId('status')->default(1);
                $table->timestamps();
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
        Schema::dropIfExists('parade_trainings');
    }
}
