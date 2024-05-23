<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateLitersToDayLitres extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('day_litres', function (Blueprint $table) {
            $table->dropColumn('initial_litre');
            $table->dropColumn('final_litre');
            $table->enum('type',['initial', 'final'])->after('initial')->after('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('day_litres', function (Blueprint $table) {
            $table->dropColumn('type');
        });
    }
}
