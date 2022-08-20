<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassRoutineDaysTable extends Migration
{
    public function up()
    {
        Schema::create('class_routine_days', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('day');
            $table->string('department');
            $table->string('batch');
            $table->bigInteger('nine_am');
            $table->bigInteger('ten_am');
            $table->bigInteger('twelve_pm');
            $table->bigInteger('two_pm');
            $table->bigInteger('three_pm');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('class_routine_days');
    }
}
