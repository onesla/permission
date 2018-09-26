<?php


namespace Onesla\Permission;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProfileCredentialTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('profile_credential')->insert([
            'profile_id' => 1,
            'credential_id' => 1,
            'created_at' => Carbon::now()
        ]);
    }
}