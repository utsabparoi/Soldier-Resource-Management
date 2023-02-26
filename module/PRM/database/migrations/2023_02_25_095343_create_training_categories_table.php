<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('training_categories')){
            Schema::create('training_categories', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->tinyInteger('status');
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
        Schema::dropIfExists('training_categories');
    }
}
