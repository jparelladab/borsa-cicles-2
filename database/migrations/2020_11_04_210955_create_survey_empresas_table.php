<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('survey_empresas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Q1');
            $table->string('Q2_num');
            $table->text('Q2_text')->nullable();
            $table->integer('Q3_Coneixements');
            $table->integer('Q3_Experience');
            $table->integer('Q3_Soft_skills');
            $table->text('Q3_text')->nullable();
            $table->string('Q4_num');
            $table->text('Q4_text')->nullable();
            $table->string('Q5_num');
            $table->text('Q5_Si_text')->nullable();
            $table->text('Q5_No_text')->nullable();
            $table->text('Q6')->nullable();
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
        Schema::dropIfExists('survey_empresas');
    }
}
