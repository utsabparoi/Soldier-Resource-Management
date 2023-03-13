<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAPRtablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('aprs')){
            Schema::create('aprs', function (Blueprint $table) {
                $table->id();
                $table->foreignId('parade_id')->constrained();
                $table->text('annual_report')->nullable();
                $table->tinyInteger('status')->default(1);
                $table->timestamps();
                $table->foreignId('created_by')->constrained('users','id');
                $table->foreignId('updated_by')->constrained('users','id');
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
        Schema::dropIfExists('a_p_rtables');
    }
}
