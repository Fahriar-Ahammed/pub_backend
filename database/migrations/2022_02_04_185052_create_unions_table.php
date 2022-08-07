<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnionsTable extends Migration
{
    public function up()
    {
        Schema::create('unions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('upazilla_id');
            $table->string('name');
            $table->string('bn_name');
            $table->string('url');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('unions');
    }
}
