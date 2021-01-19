<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyAlumnesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_alumnes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Q1_num');
            $table->text('Q1_text')->nullable();
            $table->string('Q2_num');
            $table->text('Q2_text')->nullable();
            $table->string('Q3_num');
            $table->text('Q3_text')->nullable();
            $table->string('Q4_num');
            $table->text('Q4_text')->nullable();
            $table->text('Q5')->nullable();
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
        Schema::dropIfExists('survey_alumnes');
    }
}
