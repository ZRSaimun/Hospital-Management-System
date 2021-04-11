<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id');
            $table->unsignedInteger('user_role_id')->default('50');
            $table->string('name');
            $table->string('cell');
            $table->string('email')->nullable();
            $table->string('age');
            $table->longText('address')->nullable();
            $table->string('status')->default('regular');
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
        Schema::dropIfExists('patients');
    }
}

// Patient:-
//         emp_id
//         user_role_id->default('50');
//         name
//         cell
//         email->nullable()
//         age
//         address->nullable()
//         status (premimum/regular) 

// appointment:-
//             appointment_id->unique
//             patient_id
//             doctor_id
//             appointment_date
//             appointment_time
//             status (paid/unpaid)
//             paid 