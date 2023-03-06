<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('stores')){
            Schema::create('stores', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('store_man')->nullable();
                $table->foreignId('camp_id')->comment('camps id')->constrained('camps');
                $table->tinyInteger('status');
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
        Schema::dropIfExists('stores');
    }
}
