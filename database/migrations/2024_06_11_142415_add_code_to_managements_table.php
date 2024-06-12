<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCodeToManagementsTable extends Migration
{
    public function up()
    {
        Schema::table('managements', function (Blueprint $table) {
            $table->text('code')->after('name');
        });
    }

    
    public function down()
    {
        Schema::table('managements', function (Blueprint $table) {
            $table->dropColumn('code');
        });
    }
}
