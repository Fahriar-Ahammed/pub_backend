<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMidAttendancesTable extends Migration
{
    public function up()
    {
        Schema::create('mid_attendances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('student_id');
            $table->string('batch');
            $table->string('course_name');
            $table->string('attendance');
            $table->date('date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mid_attendances');
    }
}
