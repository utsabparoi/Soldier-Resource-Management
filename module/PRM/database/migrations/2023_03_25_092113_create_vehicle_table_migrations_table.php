<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleTableMigrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('vehicle_categories')){
            Schema::create('vehicle_categories', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->tinyInteger('status')->default(1);
                $table->timestamps();
                $table->foreignId('created_by')->constrained('users','id');
                $table->foreignId('updated_by')->constrained('users','id');
            });
        }

        if(!Schema::hasTable('vehicles')){
            Schema::create('vehicles', function (Blueprint $table) {
                $table->id();
                $table->foreignId('vehicle_category_id')->constrained();
                $table->string('name');
                $table->string('engine_number')->nullable();
                $table->string('chassis_number')->nullable();
                $table->string('model_year')->nullable();
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
        Schema::dropIfExists('vehicles');
        Schema::dropIfExists('vehicle_categories');
    }
}
