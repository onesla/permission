<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('credentials');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
