<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTimesToClubmeetings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::table('clubmeetings', function($table)
        {
                $table->integer('start_time');
                $table->integer('end_time');
        });
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	Schema::table('clubmeetings', function($table)
        {
                $table->dropColumn(['start_time']);
                $table->dropColumn(['end_time']);
        });

    }
}
