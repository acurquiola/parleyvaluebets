<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTiempoLecturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tiempo_lecturas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('minutos');
            $table->integer('clase_id')->unsigned();
            $table->foreign('clase_id')->references('id')->on('clases')->onDelete('cascade');
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
        Schema::drop('tiempo_lecturas');
    }
}
