<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFuelIdToFuelDays extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fuel_days', function (Blueprint $table) {
        $table->integer('fuel_id')->unsigned()->after('status');
        $table->foreign('fuel_id')->references('id')->on('fuels')->onDelete('cascade')->onUpdate('cascade');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fuel_days', function (Blueprint $table) {
            $table->dropForeign('fuel_days_fuel_id_foreign');
            $table->dropColumn('fuel_id');
        });
    }
}
