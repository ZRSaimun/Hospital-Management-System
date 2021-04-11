<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('appointment_id')->unique();
            $table->string('patient_id');
            $table->string('patient_cell');
            $table->string('doctor_id');
            $table->string('doctor_name');
            $table->string('doctor_dept');
            $table->unsignedInteger('doctor_fee');
            $table->string('appointment_date');
            $table->string('appointment_time');
            $table->string('status')->default('pending');
            $table->string('paid')->default('unpaid');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
