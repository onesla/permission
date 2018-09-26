<?php


namespace Onesla\Permission;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProfilesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('profiles')->insert([
            'id' => 1,
            'profile_name' => 'Admin',
            'profile_description' => 'All access/operations',
            'created_at' => Carbon::now()
        ]);
    }
}