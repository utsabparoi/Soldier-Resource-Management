<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurrentProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('parade_current_profiles')){
            Schema::create('parade_current_profiles', function (Blueprint $table) {
                $table->id();
                $table->foreignId('parade_id')->constrained();
                $table->date('effected_date');
                $table->foreignId('parade_state_id')->constrained();
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
        Schema::dropIfExists('parade_current_profiles');
    }
}
