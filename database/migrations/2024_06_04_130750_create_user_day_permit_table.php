<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserDayPermitTable extends Migration
{
    public function up()
    {
        Schema::create('user_day_permit', function (Blueprint $table) {
            $table->increments('id');
            //new
            $table->integer('user_fuel_day_id')->unsigned();
            $table->foreign('user_fuel_day_id')->references('id')->on('users_fuel_days')->onDelete('cascade');
            $table->integer('permit_id')->unsigned();
            $table->foreign('permit_id')->references('id')->on('permissions')->onDelete('cascade');
            $table->enum('estado',['Propuesto', 'Autorizado','Asistió', 'No asistió', 'Cancelado']);
            $table->timestamps();

        });
    }

   
    public function down()
    {
        Schema::drop('user_day_permit');
    }
}
