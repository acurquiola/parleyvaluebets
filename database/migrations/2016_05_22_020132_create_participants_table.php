<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function(Blueprint $table){
            $table->increments('id');
            $table->integer('participantID');
            $table->string('name');
            $table->float('oddsDecimal', 4,2);    
            $table->date('lastUpdateDate');
            $table->time('lastUpdateTime');
            $table->integer('market_id')->unsigned();
            $table->foreign('market_id')->references('id')->on('markets')->onDelete('cascade');
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
        Schema::drop('participants');
    }
}
