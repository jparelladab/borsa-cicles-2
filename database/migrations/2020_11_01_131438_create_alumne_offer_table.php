<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumneOfferTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumne_offer', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('alumne_id');
            $table->foreign('alumne_id')->references('id')->on('alumnes')->onDelete('cascade');

            $table->unsignedBigInteger('offer_id');
            $table->foreign('offer_id')->references('id')->on('offers')->onDelete('cascade');

            $table->unique( array('alumne_id','offer_id') );
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
        Schema::dropIfExists('alumne_offer');
    }
}
