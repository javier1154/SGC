<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('ci', 20)->unique();
            $table->string('password', 60)->default("PDVSA20");
            $table->string('phone', 20);
            $table->string('indicator')->nullable();
            $table->string('extension')->nullable();
            $table->boolean('status')->default(1);
            

            $table->integer('management_id')->unsigned();
            $table->foreign('management_id')->references('id')->on('managements')->onDelete('cascade');

            $table->rememberToken();
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
        Schema::drop('users');
    }
}
