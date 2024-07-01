<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsersFuelDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_fuel_days', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->integer('fuel_day_id')->unsigned();

            $table->foreign('fuel_day_id')
            ->references('id')
            ->on('fuel_days')
            ->onDelete('cascade');

            $table->integer('permit_id')->unsigned();

            $table->foreign('permit_id')
            ->references('id')
            ->on('permissions')
            ->onDelete('cascade');

            $table->integer('management_id')->unsigned();

            $table->foreign('management_id')
            ->references('id')
            ->on('managements')
            ->onDelete('cascade');

            $table->integer('vehicle_id')->unsigned();

            $table->foreign('vehicle_id')
            ->references('id')
            ->on('vehicles')
            ->onDelete('cascade');

            $table->float('proposed_litre');
            $table->float('assorted_litre')->default(0);
            $table->boolean('status');
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
        Schema::dropIfExists('users_fuel_days');
    }
}
