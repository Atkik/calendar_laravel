<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	if (!Schema::hasTable('schedules')) {
        	Schema::create('schedules', function (Blueprint $table) {
            	$table->increments('No')->unique();
            	$table->date('date');
            	$table->time('start');
            	$table->time('end');
            	$table->string('schedule', 300);
                $table->string('userID', 20);
        	});
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
