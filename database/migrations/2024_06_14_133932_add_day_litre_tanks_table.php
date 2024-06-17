<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDayLitreTanksTable extends Migration
{

    public function up()
    {
        Schema::create('day_litre_tanks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('day_litre_id')->unsigned();
            
            $table->foreign('day_litre_id')
            ->references('id')
            ->on('day_litres')
            ->onDelete('cascade');

            $table->integer('tank_id')->unsigned();
            
            $table->foreign('tank_id')
            ->references('id')
            ->on('tanks')
            ->onDelete('cascade');

            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('day_litre_tanks');
    }
}
