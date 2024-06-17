<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class AddLitreToTable extends Migration
{
   
    public function up()
    {
        DB::unprepared("ALTER TABLE `day_litres` CHANGE `type` `type` ENUM('initial','final','decrease') CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL");
    }

   
    public function down()
    {
        
    }
}
