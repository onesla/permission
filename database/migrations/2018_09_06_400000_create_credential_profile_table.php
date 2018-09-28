<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreateCredentialProfileTable extends Migration
{
    public function up()
    {
        Schema::create('credential_profile', function (Blueprint $table) {
            $table->unsignedInteger('profile_id');
            $table->unsignedInteger('credential_id');
            $table->timestamps();
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('credential_profile');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
