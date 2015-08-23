<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	Schema::create('students', function(Blueprint $table) {
                       $table->increments('id');
                       $table->string('slname');
                       $table->string('sfname');
                       $table->string('snname')->nullable();
                       $table->string('country');
                       $table->string('gender');
                       $table->integer('grade');
                       $table->string('email');
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
        Schema::drop('students');
    }
}
