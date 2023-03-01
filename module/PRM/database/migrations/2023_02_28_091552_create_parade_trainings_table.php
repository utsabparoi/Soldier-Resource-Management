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
                $table->foreignId('training_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
                $table->foreignId('parade_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
                $table->string('serial_no')->nullable();
                $table->string('duration')->nullable();
                $table->string('result')->nullable();
                $table->string('remark')->nullable();
                $table->tinyInteger('status')->default(1);
//                $table->foreignId('created_by')->constrained('users', 'id');
//                $table->foreignId('updated_by')->constrained('users', 'id');
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
