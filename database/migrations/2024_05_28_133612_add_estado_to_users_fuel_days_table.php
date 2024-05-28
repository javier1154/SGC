<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEstadoToUsersFuelDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users_fuel_days', function (Blueprint $table) {
            $table->enum('estado',['Propuesto', 'Autorizado','Asistió', 'No asistió', 'Cancelado'])->default('Propuesto')->after('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_fuel_days', function (Blueprint $table) {
            $table->dropColumn('new');
        });
    }
}
