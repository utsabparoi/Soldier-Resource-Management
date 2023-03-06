<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentHoldersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('appointment_holders')){
            Schema::create('appointment_holders', function (Blueprint $table) {
                $table->id();
                $table->string('name');
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
        Schema::dropIfExists('appointment_holders');
    }
}
