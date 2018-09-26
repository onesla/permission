<?php


namespace Onesla\Permission;

use Illuminate\Database\Seeder;

class OneslaDatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            ProfilesTableSeeder::class,
            CredentialsTableSeeder::class,
            ProfileCredentialTableSeeder::class
        ]);
    }
}