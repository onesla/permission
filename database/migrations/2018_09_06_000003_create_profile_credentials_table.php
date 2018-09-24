<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreateProfileCredentialsTable extends Migration
{
    public function up()
    {
        Schema::create('profile_credentials', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_profile_id');
            $table->integer('user_credential_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('profile_credentials');
    }
}