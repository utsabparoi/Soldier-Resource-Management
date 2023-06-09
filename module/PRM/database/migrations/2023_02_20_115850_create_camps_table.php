<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatecampsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('camps')){
            Schema::create('camps', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->integer('capacity')->nullable();
                $table->string('store_man')->nullable();
                // $table->foreignId('store_id')->constrained();
                $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('camps');
    }
}
