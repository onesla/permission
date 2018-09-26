<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreateCredentialsTable extends Migration
{
    public function up()
    {
        Schema::create('credentials', function (Blueprint $table) {
            $table->increments('id');
            $table->string('function_name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('credentials');
    }
}