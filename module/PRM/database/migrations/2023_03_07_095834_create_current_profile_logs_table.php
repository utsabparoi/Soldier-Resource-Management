<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurrentProfileLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('parade_state_logs')){
            Schema::create('parade_state_logs', function (Blueprint $table) {
                $table->id();
                $table->foreignId('parade_id')->constrained();
                $table->foreignId('parade_state_id')->constrained();
                $table->foreignId('parade_current_profile_id')->constrained();
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
        Schema::dropIfExists('parade_state_logs');
    }
}
