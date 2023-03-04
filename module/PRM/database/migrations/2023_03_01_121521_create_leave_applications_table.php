<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeaveApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('leave_applications')){
            Schema::create('leave_applications', function (Blueprint $table) {
                $table->id();
                $table->foreignId('parade_id')->constrained();
                // $table->foreignId('camp_id')->constrained();
                $table->foreignId('leave_category_id')->constrained();
                $table->string('start_date');
                $table->string('end_date');
                // $table->string('contact_details')->nullable();
                $table->string('emergency_contact')->nullable();
                $table->string('attachment')->nullable();
                $table->longText('reason')->nullable();
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
        Schema::dropIfExists('leave_applications');
    }
}
