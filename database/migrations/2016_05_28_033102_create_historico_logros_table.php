<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoricoLogrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historico_logros', function(Blueprint $table){
            $table->increments('id');
            $table->integer('participantID');
            $table->string('name');
            $table->float('oddsDecimal', 4,2);       
            $table->date('lastUpdateDate');
            $table->time('lastUpdateTime');
            $table->integer('participant_id')->unsigned();
            $table->foreign('participant_id')->references('id')->on('participants')->onDelete('cascade');
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
        Schema::drop('historico_logros');
    }
}
