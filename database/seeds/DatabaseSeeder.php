<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserTableSeeder::class);
        //$this->call(UsersTableSeeder::class);
        //$this->call(AcaosTableSeeder::class);
        //$this->call(MensagemsTableSeeder::class);
        //$this->call(MensagemADMstableSeeder::class);
        //$this->call(RifasTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);
        //$this->call(RoleUserTableSeeder::class);

    }
}
