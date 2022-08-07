<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinalAttendancesTable extends Migration
{
    public function up()
    {
        Schema::create('final_attendances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('student_id');
            $table->string('batch');
            $table->string('course_name');
            $table->boolean('attendance');
            $table->date('date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('final_attendances');
    }
}
