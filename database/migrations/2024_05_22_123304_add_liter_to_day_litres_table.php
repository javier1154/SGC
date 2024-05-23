<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLiterToDayLitresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('day_litres', function (Blueprint $table) {
            $table->float('litres')->after("type");
            $table->float('cm')->after("type")->nullable();
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
            $table->dropColumn('litres');
            $table->dropColumn('cm');
        });
    }
}
