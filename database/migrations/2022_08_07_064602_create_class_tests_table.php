<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassTestsTable extends Migration
{
    public function up()
    {
        Schema::create('class_tests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('batch');
            $table->string('course_name');
            $table->string('class_test_details');
            $table->date('submission_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('class_tests');
    }
}
