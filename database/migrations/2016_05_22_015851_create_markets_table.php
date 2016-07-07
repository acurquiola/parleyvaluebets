<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('markets', function(Blueprint $table){
            $table->increments('id');
            $table->integer('marketID');
            $table->string('name');
            $table->date('betTillDate');
            $table->time('betTillTime');        
            $table->date('lastUpdateDate');
            $table->time('lastUpdateTime');
            $table->integer('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
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
        Schema::drop('markets');
    }
}
