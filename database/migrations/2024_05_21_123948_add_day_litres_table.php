<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDayLitresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('day_litres', function (Blueprint $table) {
            $table->increments('id');
            $table->float('initial_litre');
            $table->float('final_litre');
            $table->boolean('status');
            $table->integer('fuel_day_id')->unsigned();
            $table->foreign('fuel_day_id')->references('id')->on('fuel_days')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('day_litres');
    }
}
