<?php


namespace Onesla\Permission;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CredentialProfileTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('credential_profile')->insert([
            'profile_id' => 1,
            'credential_id' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
