<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class AlterUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('profile_id')->nullable();

            $table->foreign('profile_id')
                ->references('id')
                ->on('profiles')
                ->onDelete('set null');
        });
    }
}
