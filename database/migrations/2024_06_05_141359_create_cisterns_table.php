<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCisternsTable extends Migration
{
   
    public function up()
    {
        Schema::create('cisterns', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description')->nullable();
            $table->float('received_litre');

            $table->integer('permit_id')->unsigned();
            
            $table->foreign('permit_id')
            ->references('id')
            ->on('permissions')
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
        Schema::dropIfExists('cisterns');
    }
}
