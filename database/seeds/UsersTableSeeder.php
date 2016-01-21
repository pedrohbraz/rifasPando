<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      DB::table('users')->insert([
          'name' => 'pedro',
          'email' => 'abc@abc.com',
          'telefone' => '123456',
          'login'=>'pedro',
          'password'=>'123456',
          'is_manager'=>true,
      ]);
    }
  }
