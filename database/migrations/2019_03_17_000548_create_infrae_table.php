<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfraeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('infrae', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idEdi');
            $table->foreign('idEdi')->references('id')->on('edificios')->onDelete('cascade');;
            $table->unsignedBigInteger('idTipoI');
            $table->foreign('idTipoI')->references('id')->on('tipo_inf')->onDelete('cascade');;
            //($table->string('descI');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migration
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('infrae');
    }
}
