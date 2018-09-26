<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreateProfileCredentialTable extends Migration
{
    public function up()
    {
        Schema::create('profile_credential', function (Blueprint $table) {
            $table->unsignedInteger('profile_id');
            $table->unsignedInteger('credential_id');
            $table->timestamp('created_at')->nullable();
            $table->unique(['profile_id', 'credential_id']);

            $table->foreign('profile_id')
                ->references('id')
                ->on('profiles')
                ->onDelete('cascade');

            $table->foreign('credential_id')
                ->references('id')
                ->on('credentials')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('profile_credential');
    }
}