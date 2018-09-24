<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreateUserCredentialsTable extends Migration
{
    public function up()
    {
        Schema::create('user_credentials', function (Blueprint $table) {
            $table->increments('id');
            $table->string('function_name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_credentials');
    }
}