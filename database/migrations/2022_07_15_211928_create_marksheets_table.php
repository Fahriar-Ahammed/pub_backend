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
            $table->bigInteger('student_id');
            $table->string('batch');
            $table->string('course');
            $table->string('term');
            $table->string('assignment')->nullable();
            $table->string('presentation')->nullable();
            $table->string('class_test')->nullable();
            $table->string('course_mark')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('marksheets');
    }
}
