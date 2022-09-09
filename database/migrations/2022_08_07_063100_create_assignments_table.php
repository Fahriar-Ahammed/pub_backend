<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssignmentsTable extends Migration
{
    public function up()
    {
        Schema::create('assignments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('batch_id');
            $table->string('term');
            $table->string('course_name');
            $table->string('assignment_details');
            $table->date('submission_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('assignments');
    }
}
