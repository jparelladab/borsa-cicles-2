<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name');
            $table->string('last_name_1');
            $table->string('last_name_2');
            $table->string('DNI');
            $table->date('date_of_birth');
            $table->string('address');
            $table->string('location');
            $table->string('zip_code')->nullable();
            $table->string('phone_number');
            $table->string('languages')->nullable();
            $table->mediumText('valoracio')->nullable();
            
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->integer('study_end');
            $table->string('avatar')->nullable();
            $table->string('cv')->nullable();
            $table->boolean('pending_survey')->default('0');
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
        Schema::dropIfExists('alumnes');
    }
}
