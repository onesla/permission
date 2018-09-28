<?php


namespace Onesla\Permission;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CredentialsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('credentials')->insert([
            'id' => 1,
            'function_name' => '*',
            'created_at' => Carbon::now()
        ]);
    }
}
