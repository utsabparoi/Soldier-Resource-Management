<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('trainings')){
            Schema::create('trainings', function (Blueprint $table) {
                $table->id();
                $table->foreignId('training_category_id')->constrained();
                $table->string('name');
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
        Schema::dropIfExists('trainings');
    }
}
