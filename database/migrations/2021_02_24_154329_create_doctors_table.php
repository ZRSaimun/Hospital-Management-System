<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id')->unique();
            $table->unsignedInteger('user_role_id')->default('3');
            $table->string('name');
            $table->string('nick_name')->nullable();
            $table->string('cell')->nullable();
            $table->string('email')->unique();
            $table->string('age')->nullable();
            $table->longText('about')->nullable();
            $table->longText('work_experience')->nullable();
            $table->string('social_media')->nullable();
            $table->string('department');
            $table->string('status')->default('Published');
            $table->string('photo')->default('avatar.jpg');
            $table->string('degree')->nullable();
            $table->longText('education')->nullable();
            $table->longText('appointment')->nullable();
            $table->unsignedInteger('fee')->nullable();
            $table->longText('address')->nullable();
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
        Schema::dropIfExists('doctors');
    }
}
