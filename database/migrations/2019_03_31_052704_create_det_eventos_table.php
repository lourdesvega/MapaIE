<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('det_eventos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idEdi');
            $table->foreign('idEdi')->references('id')->on('edificios')->onDelete('cascade'); 
            $table->unsignedBigInteger('idEvento');
            $table->foreign('idEvento')->references('id')->on('eventos')->onDelete('cascade'); 
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
        Schema::dropIfExists('det_eventos');
    }
}
