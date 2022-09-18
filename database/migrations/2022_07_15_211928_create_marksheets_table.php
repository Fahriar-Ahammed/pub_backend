<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarksheetsTable extends Migration
{
    public function up()
    {
        Schema::create('marksheets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('teacher_id');
            $table->bigInteger('student_id');
            $table->string('batch');
            $table->string('course');
            $table->string('term');
            $table->string('assignment')->default('0');
            $table->string('presentation')->default('0');
            $table->string('class_test')->default('0');
            $table->string('course_mark')->default('0');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('marksheets');
    }
}
