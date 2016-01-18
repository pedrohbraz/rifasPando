<?php

use Illuminate\Database\Seeder;

class MensagemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('mensagems')->insert([
          'id_user' => 1,
          'id_acao' => 1,
          'mensagem' => 'testando mensagens',


      ]);
    }
}
