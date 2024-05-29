<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddManageLevelToFuelDaysTable extends Migration
{
    public function up()
    {
        Schema::table('fuel_days', function (Blueprint $table) {
            $table->enum('manage_level',['Nueva', 'Autorizada','Finalizada'])->default('Nueva')->after('status');
        });
    }

    
    public function down()
    {
        Schema::table('fuel_days', function (Blueprint $table) {
            $table->dropColumn('manage_level');
        });
    }
}
